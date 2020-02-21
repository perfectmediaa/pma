<?php
namespace App\Http\Controllers\Admin;
use App\Album;
use App\Http\Controllers\Controller;
use App\Modelform;
use App\User;
use App\User\Profile;
use App\User\Transaction;
use App\User\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image as Itimg;
use Intervention\Image\Exception\NotReadableException;
use Illuminate\Support\Str;

class Userscontroller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index(Request $request){
        if($request->paid!=""){
            $users = User::where(['paid' => $request->paid, 'type'=> $request->type])->
            where(function($query) use ($request){
                $query->where('name','LIKE',"%$request->search%")
                ->orWhere('email','LIKE',"%$request->search%");
            })->paginate(12);
            $users->appends(['search' => $request->search]);
            return view('admin.users',compact('users'));
        }
        $users = User::latest('id')->paginate(10);
        return view('admin.users',['users' => $users]);
        
    }
    public function profile(User $user){
        $tranx = Transaction::where('user_id', $user->id)->latest('id')->paginate(5);
        return view('admin.profile', compact('user','tranx'));
        
    }
    public function accountedit(User $user, Request $request){
        $this->validate($request, [
            'name'     => 'required|max:40',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'mobile' => 'required|digits:10|unique:users,mobile,'.$user->id,
            'city' => 'nullable|max:30',
            'password' => 'nullable|min:6',
            
        ]);
        if($request->filled('password')){
            $user->password = Hash::make($request->password);
        }
        $user->name = $request->name;
        $user->email = $request->email;
        $user->city = $request->city;
        $user->bio = $request->bio;
        $user->gender = $request->gender;
        $user->save();
        return response()->json('success');
    }

    public function profileedit(Profile $id, Request $request){

        $this->validate($request, [
            'age'     => 'sometimes|digits:2',
            'hair' => 'sometimes|max:15',
            'height' => 'sometimes|max:10',
            'eyes' => 'sometimes|max:15',
            'weight' => 'sometimes|max:10',
            'mobile' => 'sometimes|max:10',
            'interest' => 'sometimes|max:300',
            'address' => 'sometimes|max:70',
            'experience' => 'sometimes|max:900',
        ]);

        $id->update($request->all());
        return response()->json('success');
        
    }

    public function albumedit($user, Request $request){

        $this->validate($request, [
            'title' => 'required',
            'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'public' => 'required',
            'status' => 'required'
        ]);
        $album = Album::where('user_id',$user)->first();
        if($file = $request->file('image')){
            $fileNameToStored = str::random(4).time().$file->getClientOriginalName();;
            //resize the images
            $img = Itimg::make($file)
            ->resize(1080, 1080, function($constraint) {
                $constraint->aspectRatio();
               })->save(public_path('albums/'.$fileNameToStored));
                $oldImage = public_path("albums/{$album->cover_image}");
                if (is_file($oldImage)) { // unlink or remove previous image from folder
                    unlink($oldImage);
                }
                
                $album->cover_image = $fileNameToStored;
                
        }
        $album->name = $request->title;
        $album->status = $request->status;
        $album->public = $request->public;
        $album->save();
        return response()->json('success');
        
    }
    public function userid(Request $request)
    {
        $data = [];
        if($request->has('q')){
            $search = $request->q;
            $data = User::select("id","name")->where('paid',1)
            		->where('name','LIKE',"%$search%")->latest()
            		->get();
        }
        return response()->json($data);
    }
    public function forms(){
        $total = Modelform::count();
        $forms = Modelform::with('user')->latest('id')->paginate(12);
        return view('admin.forms', compact('forms','total'));

    }
    public function wallet($user,Request $request){
        $this->validate($request, [
            'add_amount'     => 'nullable|sometimes|integer|min:1',
            'minus_amount' => 'nullable|sometimes|integer|min:1',
            'note' => 'required|max:100',
            
        ]);

        if($request->filled('add_amount') && $request->filled('minus_amount') ){
           return response()->json([
                'message' => 'Only One',
                'errors' => [
                    'only' => 'Please select only either add or Minus',
                ],
            ], 422);

            return response()->json('success');
        }
        else{
            if($request->filled('add_amount')){
                $wallet = Wallet::where('user_id',$user)->first();
                $wallet->balance = ($wallet->balance + $request->add_amount);
                $wallet->save();
                Transaction::create([
                    'user_id' => $user,
                    'amount' => $request->add_amount,
                    'type' => 'received',
                    'note' => $request->note,
                ]);
                return response()->json('success');
            }
            if($request->filled('minus_amount')){
                $wallet = Wallet::where('user_id',$user)->first();
                if($wallet->balance >= $request->minus_amount){
                    $wallet->balance = ($wallet->balance - $request->minus_amount);
                    $wallet->save();
                    Transaction::create([
                        'user_id' => $user,
                        'amount' => $request->minus_amount,
                        'type' => 'sent',
                        'note' => $request->note,
                    ]);
                    return response()->json('success');
                }else{
                    return response()->json([
                        'message' => 'balance',
                        'errors' => [
                            'baal' => 'Please amount is less than minus balance',
                        ],
                    ], 422);
        
                    
                }
            }
        }
        
        
    }
    public function profile_type($user,Request $request){
        $this->validate($request, [
            'type'     => 'required',
            'paid' => 'required',
            
        ]);
        $user = User::findorfail($user);
        $user->type = $request->type;
        $user->paid = $request->paid;
        $user->save();
        return response()->json('success');

    }
   
}
