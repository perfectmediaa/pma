<?php

namespace App\Http\Controllers;

use App\Image;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('profile', 'info','store','update','photos');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function profile(){
        $images = Image::get();
        return view('index', compact('images'));
    }
    public function info(){
        return view('user.info');
    }
    public function update(){
      
        if(Auth::user()){
            $user = Auth::user()->id;
            $id = User::find($user);
            return view('user.update', compact('id'));
        }
        else{
            return "not auth";
        }
       
    }
    public function store(request $request) {

        $this->validate($request, [
            'images' => 'required',
            'album'=>'required'
            ]);

            if ($files = $request->file('images')){
                $album = $request->album;
                foreach ($files as $file){
                    $gallery = new Image;
                    $image_name = str::random(5).time().$file->getClientOriginalName();
                    $file->move('public/images/',$image_name);
                    $gallery['image'] = $image_name;
                    $gallery['album_id'] = $album;
                    $gallery->save();
                }
            }
    
    
        return back()->with('success', 'Data Your files has been successfully added');
    }

    public function photos(){
        $images = Image::get();
        return view('photos', compact('images'));
    }

    
}
