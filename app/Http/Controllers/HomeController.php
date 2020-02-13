<?php

namespace App\Http\Controllers;

use App\Album;
use App\Image;
use App\User;
use App\User\Video;
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
        $albums = Album::latest()->get();
        $videos = Video::latest()->get();
        return view('index', compact('albums','videos'));
    }
    public function info(){
        return view('user.info');
    }
    

    public function photos(Album $photo){
        $images = Image::where('album_id', $photo->id)->get();
        return view('photos', compact('images','photo'));
    }
    public function video(Video $video){
        return view('video', compact('video'));
    }

    
}
