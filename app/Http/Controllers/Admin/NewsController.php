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
        $news = News::latest('id')->paginate(8);
        return view('admin.all_news',compact('news'));
        
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
            'status' =>'required'
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
        $news->status = $request->status;
        $news->save();

        return back()->with('success', 'Your News Has been successfully added');     
    }
    public function update(News $news){
        
        return view('admin.update_news',compact('news'));     
    }
    public function update_news(News $news, Request $request){
        $this->validate($request,[
            'title' => 'required',
            'description' => 'required',
            'image' => 'sometimes',
            'tags' => 'sometimes',
            'status' =>'required'
        ]);

        if($file = $request->file('image')){
            $oldImage = public_path("news_img/{$news->image}");
            if (is_file($oldImage)) { // unlink or remove previous image from folder
                unlink($oldImage);
            }
            $news->delete();
            $fileNameToStored = str::random(4).time().'.'.$file->getClientOriginalName();;
            //resize the images
            $img = Image::make($file)
                ->resize(1200, 630, function($constraint) {
                    $constraint->aspectRatio();
                   })->save(public_path('news_img/'.$fileNameToStored));
                $news->image = $fileNameToStored; 
        }
        $news->title = ucfirst($request->title);
        $news->description = ucfirst($request->description);
        $news->tags = $request->tags;
        $news->status = $request->status;
        $news->save();
        return back()->with('success', 'Your News Has been successfully updated');     
       
    }
    public function delete(News $news){
        $oldImage = public_path("news_img/{$news->image}");
            if (is_file($oldImage)) { // unlink or remove previous image from folder
                unlink($oldImage);
            }
            $news->delete();
        return redirect()->route('admin.news')->with('success', 'Your News Has been successfully Removed');
    }

}
