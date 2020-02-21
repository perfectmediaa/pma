<?php

namespace App\Http\Controllers\Admin;

use App\Album;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use Intervention\Image\Exception\NotReadableException;
use Illuminate\Support\Str;
use App\Image as Imz;
use App\User\Video;

class PhotosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {
        return view('admin.photos');
    }
    public function index_videos()
    {
        return view('admin.videos');
    }
    public function album(Request $request)

    {
        $this->validate($request, [
        'title' => 'required',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'show' => 'required'
    ]);
    
    
    if($file = $request->file('image')){
            $fileNameToStored = str::random(4).time().'.'.$file->getClientOriginalName();;
            //resize the images
            $img = Image::make($file)
                ->resize(1080, 1080, function($constraint) {
                    $constraint->aspectRatio();
                   })
                ->save(public_path('albums/'.$fileNameToStored));

                $album = new Album();
                $album->name = ucwords(strtolower($request->title));
                $album->cover_image = $fileNameToStored;
                $album->public = $request->show;
                $album->status = 1;
                $album->save();
                return response()->json(['success'=>'done']);  
        }
    }

    public function albumid(Request $request)

    {
        $data = [];
        if($request->has('q')){
            $search = $request->q;
            $data = Album::select("id","name")
            		->where('name','LIKE',"%$search%")->latest()
            		->get();
        }
        return response()->json($data);
    }

    public function videoid(Request $request)

    {
        $data = [];
        if($request->has('q')){
            $search = $request->q;
            $data = Video::select("id","name")
            		->where('name','LIKE',"%$search%")->latest()
            		->get();
        }
        return response()->json($data);
    }

    public function albumidget(Request $request){
        
    }
    public function store(request $request) {

        $this->validate($request, [
            'images' => 'required',
            'album'=>'required'
            ]);

            if ($files = $request->file('images')){
                foreach ($files as $file){
                    $gallery = new Imz;
                    $image_name = str::random(5).time().$file->getClientOriginalName();
                    $img = Image::make($file)
                    ->resize(1200, 675, function($constraint) {
                        $constraint->aspectRatio();
                       })
                    ->save(public_path('images/'.$image_name));
                    $gallery['image'] = $image_name;
                    $gallery['album_id'] = $request->album;
                    $gallery->save();
                }
            return back()->with('success', 'Data Your files has been successfully added');
                
            }    
    
    }

    public function add_video(Request $request){
        $this->validate($request,[
            'name' => 'required',
            'url' => 'required|url',
            
        ]);
          $url = $request->url;
        
            parse_str( parse_url( $url, PHP_URL_QUERY ), $my_array_of_vars );
            $finalUrl = $my_array_of_vars['v'];
            $video = new Video;
            $video->name = ucwords(strtolower($request->name));
            $video->video = $finalUrl;
            $video->user_id = $request->user;
            $video->display = true;
            $video->save();
            return response()->json('success');
        
    }
    public function all_album(Request $request)
    {   $search =  $request->input('search');
        if($search!=""){
            $albums = album::where('status',$request->search)->latest('id')
            ->paginate(12);
            $albums->appends(['search' => $search]);
            return view('admin.album',compact('albums'));
        }
        $albums = Album::latest('id')->paginate(12);
        return view('admin.album',compact('albums'));
    }
    public function single_album(Album $album){
        return view('admin.album_photos',compact('album'));
    }
    public function deleteImg(Imz $id){
        
        $oldImage = public_path("images/{$id->image}");
                if (is_file($oldImage)) { // unlink or remove previous image from folder
                    unlink($oldImage);
                }
        $id->delete();
        
        return back()->with('success', 'Data Your image has been successfully added');
        
        
    }
    public function album_update(Album $album, Request $request)

    {
        $this->validate($request, [
        'title' => 'required',
        'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:3148',
        'public' => 'required',
        'sta' => 'required'
    ]);
    if($file = $request->file('image')){
            $fileNameToStored = str::random(4).time().'.'.$file->getClientOriginalName();;
            //resize the images
            $img = Image::make($file)
                ->resize(1080, 1080, function($constraint) {
                    $constraint->aspectRatio();
                   })
                ->save(public_path('albums/'.$fileNameToStored));
                $oldImage = public_path("albums/{$album->cover_image}");
                if (is_file($oldImage)) { // unlink or remove previous image from folder
                    unlink($oldImage);
                }
                $album->name = ucwords(strtolower($request->title));
                $album->cover_image = $fileNameToStored;
                $album->status = $request->status;
                $album->public = $request->public;
                $album->save();
                return back()->with('success', 'Data Your image has been successfully added');
        }
        else{
            $album->name = $request->title;
            $album->status = $request->sta;
            $album->public = $request->public;
            $album->save();
            return back()->with('success', 'Data Your image has been successfully added');
        }
    }
    public function all_videos()
    {
        $videos = Video::latest('id')->paginate(12);
        return view('admin.all_videos',compact('videos'));
    }

    public function video_update(Video $video, Request $request){
        $this->validate($request,[
            'name' => 'required',
            'display' => 'required'
        ]);
        $video->name = ucwords(strtolower($request->name));
        $video->display = $request->display;
        $video->save();
        return back()->with('success', 'Data Your video has been successfully Updated');

    }

    public function video_delete(Video $video){
        $video->delete();
        return back()->with('success', 'Data Your video has been successfully removed');

    }
}
