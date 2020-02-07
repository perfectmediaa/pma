<?php

namespace App\Http\Controllers\Admin;

use App\Album;
use App\Http\Controllers\Controller;
use App\User;
use App\User\Profile;
use Illuminate\Http\Request;

class Userscontroller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index(){
        $users = User::with('profile','album','wallet')->get();
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
    
}
