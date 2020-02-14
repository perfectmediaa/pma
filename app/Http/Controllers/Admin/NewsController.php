<?php

namespace App\Http\Controllers\Admin;

use App\Admin\News;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;


class NewsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index(){
        $news = News::latest()->get();
        return view('admin.create_news',compact('news'));
        
    }
    public function create(){
        
            return view('admin.create_news');     
    }
    public function store(Request $request){
        $this->validate($request,[
            'title' => 'required',
            'description' => 'required',
            'image' => 'sometimes',
            'tags' => 'sometimes',
        ]);
        $news_slug = Str::slug($request->title, "-").'_'.str::random(5);
        $news = new News;
        if($file = $request->file('image')){
            $fileNameToStored = str::random(4).time().'.'.$file->getClientOriginalName();;
            //resize the images
            $img = Image::make($file)
                ->resize(1200,675)
                ->save(public_path('news_img/'.$fileNameToStored));
                $news->image = $fileNameToStored; 
        }
        $news->title = ucfirst($request->title);
        $news->description = ucfirst($request->description);
        $news->tags = $request->tags;
        $news->slug = $news_slug;
        $news->save();

        return back()->with('success', 'Your News Has been successfully added');     
    }

}
