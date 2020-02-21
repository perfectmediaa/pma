<?php

namespace App\Http\Controllers\User;

use App\Album;
use App\Http\Controllers\Controller;
use App\Image;
use App\Modelform;
use App\User;
use App\User\Profile;
use App\User\Transaction;
use App\User\Video;
use App\User\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image as Ima;
use File;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('modelform');
    }
    
    public function modelform(){
        if(Auth::user()){
        $wallet = Wallet::where('user_id',Auth::user()->id)->first();
        return view('user.modelform', compact('wallet'));
        }
        return view('user.modelform');
        
    }
    public function formStore(Request $request){
        if(!Auth::user()){
            return response()->json([
                'message' => 'not Logged in',
                'errors' => [
                    'Login' => 'You must Login first',
                ],
            ], 422);
        }
        $id = Auth::user()->id;
        $formfee = 500;
        $form = Modelform::where('user_id', $id)->first();
        if(empty($form)){
            $data = $this->validate($request,[
                'name' => 'required|',
                'address'=> 'required'
            ]);

            if(Auth::user()->wallet->balance >= $formfee){

                $data['user_id'] = $id;
                Modelform::create($data);
                $wallet = Wallet::where('user_id',$id)->first();
                        $wallet->balance = ($wallet->balance - $formfee);
                        $wallet->save();
                    Transaction::create([
                        'user_id' => $id,
                        'amount' => $formfee,
                        'type' => 'sent',
                        'note' => "Model registration form fee",
                    ]);

                return response()->json('success');
            }
            else{
                    return response()->json([
                        'message' => 'not enough balance',
                        'errors' => [
                            'amont' => 'Not enough Balance <br> Please add fund',
                        ],
                    ], 422);
            }
           
        }
        else{
            return response()->json([
                'message' => 'Applied',
                'errors' => [
                    'Login' => 'You have already applied this form',
                ],
            ], 422);
        }
       
    }
    public function get_wallet(){
        $wallet = Wallet::where('user_id',Auth::user()->id)->first();
        $tranx = Transaction::where('user_id',Auth::user()->id)->latest('id')->paginate(8);
        return view('user.wallet', compact('wallet','tranx'));

    }
    public function khalti(Request $request){
        if(!Auth::user()){
            return response()->json([
                'message' => 'not Logged in',
                'errors' => [
                    'Login' => 'You must Login first',
                ],
            ], 422);
        }
        $this->validate($request,[
            'token' => 'required',
            'amount'=> 'required',
        ]);
        $args = http_build_query(array(
            'token' => $request->token,
            'amount'  => $request->amount,
        ));
        $url = "https://khalti.com/api/v2/payment/verify/";
        # Make the call using API.
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,$args);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        $headers = ['Authorization: Key test_secret_key_90af8ac105f345abaf47fca9defc30eb'];
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLINFO_HEADER_OUT, true);

        // Response
        $response = curl_exec($ch);
        $dump = array(
        "curl" => curl_getinfo($ch),
        "khalti" => $response
        );

        //$status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        $payment_log_data = array();
        $responseArray = (array)json_decode($response);
        if(array_key_exists('idx', $responseArray)){
            $amt = ($request->amount/100);
            $id = Auth::id();
            $wallet = Wallet::where('user_id',$id)->first();
                    $wallet->balance = ($wallet->balance + $amt);
                    $wallet->save();
            Transaction::create([
                        'user_id' => $id,
                        'amount' => $amt,
                        'type' => 'received',
                        'note' => "Deposit using Khalti",
                    ]);
            return response()->json('success');
        }
        else{
            return response()->json([
                'message' => 'invalid',
                'errors' => [
                    'inval' => 'Your transaction is invalid',
                ],
            ], 422);
        }
    }

    public function profile(){
        $user = Auth::user();
        return view('user.info',compact('user'));
    }
    public function update(){
      
        if(Auth::user()){
            $user = Auth::user();
            return view('user.update', compact('user'));
        }
        else{
            return "not auth";
        }
       
    }
    public function store(request $request) {

        $this->validate($request, [
            'images' => 'required',
            'images.*' => 'image|mimes:jpeg,png,jpg,JPEG,JPG,PNG|max:7098',
            ]);
        
            if(Auth::user()->paid){
                $album = Album::where('user_id',Auth::id())->value('id');
                if ($files = $request->file('images')){
                    foreach ($files as $file){
                        $gallery = new Image;
                        $image_name = str::random(5).time().$file->getClientOriginalName();
                        $img = Ima::make($file)->resize(1200, 675, function($constraint) {
                            $constraint->aspectRatio();
                           })
                        ->save(public_path('images/'.$image_name));
                        $gallery['image'] = $image_name;
                        $gallery['album_id'] = $album;
                        $gallery->save();
                    }
                 }
                 return back()->with('success', 'Your files has been successfully added');
            }else{
                return back()->with('success', 'Please Upgrade Your Account to add Images');
            }
    
        
    }

    public function photos(){
        $user = Auth::user();
        $images = Image::where('album_id',$user->album->id)->latest('id')->get();
        return view('user.photos', compact('images','user'));
    }

    public function album(Request $request)

    {
        $this->validate($request, [
        'title' => 'required',
        'image' => 'required|image|mimes:jpeg,png,jpg,JPEG,JPG,PNG|max:7078',
    ]);
    $album = Album::where('user_id',Auth::id())->first();
    $this->authorize('update', $album);
    if($file = $request->file('image')){
            $fileNameToStored = str::random(4).time().$file->getClientOriginalName();;
            //resize the images
            $img = Ima::make($file)
            ->resize(1080, 1080, function($constraint) {
                $constraint->aspectRatio();
               })->save(public_path('albums/'.$fileNameToStored));
                $oldImage = public_path("albums/{$album->cover_image}");
                if (is_file($oldImage)) { // unlink or remove previous image from folder
                    unlink($oldImage);
                }
                $album->name = $request->title;
                $album->cover_image = $fileNameToStored;
                $album->save();
                return back()->with('success', 'Your image has been successfully added');
        }
    }
    public function deleteImg(Image $id){
        $album = Image::where('id', $id->id)->first();
        $user = Album::find($album->album_id);
        $this->authorize('destroy', $user);
        $oldImage = public_path("images/{$id->image}");
                if (is_file($oldImage)) { // unlink or remove previous image from folder
                    unlink($oldImage);
                }
        $id->delete();
        
        return back()->with('success', 'Your image has been successfully Removed');
        
        
    }
    public function upgrade(){
        $user = Auth::user();
        return view('user.upgrade',compact('user'));
    }
    public function upgrade_show(){
        if(!Auth::user()->paid){
            $user = Auth::user()->with('wallet')->first();
            return view('user.final_Pay',compact('user'));
        }else{
            return redirect()->route('profile');
        }
        
    }
    public function upgrade_final(Request $request){
        if(!Auth::user()->paid){
            $charge = 2000;
            $user = Auth::user();
            if(Auth::user()->wallet->balance>= $charge){
                $wallet = Wallet::where('user_id',$user->id)->first();
                        $wallet->balance = ($wallet->balance - $charge);
                        $wallet->save();
                $user->paid = 1;
                $user->type =3;
                $user->save();
                    Transaction::create([
                        'user_id' => $id,
                        'amount' => $charge,
                        'type' => 'sent',
                        'note' => "Purchase Paid Membership",
                    ]);

                return redirect()->route('profile')->with('success', 'Your account has been upgraded');
            }
            else{
                return back()->with('success', 'Your balance is insufficent please add balace and try again');
            }
           
        }
        return redirect()->route('profile');
        
    }
    public function videos(){
        $videos = Video::where('user_id', Auth::id())->latest()->get();
        return view('user.my_videos',compact('videos'));
    }
    public function update_pass(Request $request){
    $this->validate($request, [
            'current_password'     => 'required',
            'new_password'     => 'required|min:6',
            'confirm_password' => 'required|same:new_password',
        ]);
    
        if(Hash::check($request->current_password, Auth::user()->password)){
    
            User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);
            return response()->json('success');
    
        }else{
    
            return response()->json([
                'message' => 'invalid',
                'errors' => [
                    'inval' => 'Your current Password is incorrect',
                ],
            ], 422);
    
        }
    }
    public function update_account(Request $request){
        $user = Auth::user();
        $this->validate($request, [
            'name'     => 'required|max:40',
            'email' => 'required|max:50|email|unique:users,email,'.$user->id,
            'city' => 'required|max:30',
            'bio' => 'sometimes|max:60',
            'gender' => 'required'
        ]);
        $user->email = $request->email;
        $user->name = ucwords(strtolower($request->name));
        $user->city = ucwords(strtolower($request->city));
        $user->bio = ucfirst($request->bio);
        $user->gender = $request->gender;
        $user->save();
        return response()->json('success');
    }
    public function update_profile(Request $request){
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
        if(Auth::user()->paid==1){
            $profile = Auth::user()->profile;
            $profile->update($request->all());
            return response()->json('success');

        }else{
            return response()->json([
                'message' => 'not member',
                'errors' => [
                    'member' => 'Please purchase Membership to add your Info',
                ],
            ], 422);
        }
        
    }
}
