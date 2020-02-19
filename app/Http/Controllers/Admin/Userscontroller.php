<?php
namespace App\Http\Controllers\Admin;
use App\Album;
use App\Http\Controllers\Controller;
use App\Modelform;
use App\User;
use App\User\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $users = User::latest()->get();
        return view('admin.users',['users' => $users]);
        
    }
    public function profile(User $id){
        return view('admin.profile', compact('id'));
        
    }
    public function accountedit(User $id, Request $request){

        $this->validate($request, [
            'email' => 'required|email',
            'name' => 'required|',
            
        ]);
        $user = User::find($id->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
        return response()->json($id);
    }

    public function profileedit(Profile $id, Request $request){

        $this->validate($request, [
            'age' => 'required|sometimes',
            "experience" => 'required',
            'address' => 'required',
        ]);

        $id->update($request->all());
        return response()->json($request->experience);
        
    }

    public function albumedit(Album $id, Request $request){

        $this->validate($request, [
            'name' => 'required|sometimes',
            "image" => 'required',
            
        ]);

        $id->update($request->all());
        return response()->json($request->experience);
        
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
   
}
