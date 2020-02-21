<?php

namespace App\Http\Controllers;

use App\Admin\News;
use App\Album;
use App\Image;
use App\User;
use App\User\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


class HomeController extends Controller
{
   
    public function index()
    {
        $albums = Album::where('public',true)->latest('id')->take(8)->get();
        $videos = Video::where('display',true)->latest('id')->take(8)->get();
        $news = News::latest('id')->where('status',1)->take(3)->get();
        return view('index', compact('albums','videos','news'));
    }
    public function profile(){
        $albums = Album::latest()->get();
        $videos = Video::latest()->get();
        $news = News::latest('id')->where('status',1)->take(3)->get();
        return view('index', compact('albums','videos','news'));
    }
    public function info(User $user){
        if($user->paid==1){
            return view('profile',compact('user'));
        }else{
            return redirect()->route('index');
        }
    }
    

    public function photos(Album $photo){
        if($photo->status==1){
            $images = Image::where(['album_id' => $photo->id])->latest('id')->get();
             return view('photos', compact('images','photo'));
        }else{
           return redirect()->route('index');
        }
        
    }
    public function video(Video $video){
        return view('video', compact('video'));
    }

    public function single_news($slug){
        $news = News::where("slug", $slug)->where('status',1)->first();
        $recent = News::latest('id')->where('status',1)->take(5)->get();
    	if(!$news){
            return redirect()->route('index');
        }
        return view('single_news',compact('news','recent'));
    }
    public function all_news(){
        $news = News::latest('id')->where('status',1)->paginate(8);
        return view('all_news',compact('news'));
    }
    public function models(Request $request)
    {   
        $this->validate($request,[
            'search' => 'max:30',
        ]);
        $search =  $request->input('search');
        if($search!=""){
            $users = User::with('album')->where('name','LIKE',"%$request->search%")
            ->orWhere('email','LIKE',"%$request->search%")->paginate(12);
            $users->appends(['search' => $search]);
            return view('all_models',compact('users'));
        }else{
            $users = User::with('album')->latest('id')->paginate(8);
            return view('all_models',compact('users'));
        }
        
    }
    public function albums(Request $request)
    {   
        $this->validate($request,[
            'search' => 'max:30',
        ]);
        $search =  $request->input('search');
        if($search!=""){
            $albums = Album::where('status',1)->where('name','LIKE',"%$request->search%")->paginate(12);
            
            $albums->appends(['search' => $search]);
            return view('all_albums',compact('albums'));
        }else{
            $albums = Album::where('status',1)->latest('id')->paginate(8);
            return view('all_albums',compact('albums'));
        }
        
    }
    public function videos(Request $request)
    {  
        $this->validate($request,[
            'search' => 'max:30',
        ]);
        $search =  $request->search;
        if($search!=""){
            $videos = Video::where('name','LIKE',"%$search%")->paginate(12);
            $videos->appends(['search' => $search]);
            return view('all_videos',compact('videos'));
        }
        else{
            $videos = Video::latest('id')->paginate(8);
            return view('all_videos',compact('videos'));
        }
        
    }
    public function about(){
        return view('about');
    }

}
