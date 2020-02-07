<?php

namespace App\Http\Controllers\Admin;

use App\Album;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use Intervention\Image\Exception\NotReadableException;
use Illuminate\Support\Str;

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
    public function album(Request $request)

    {
        $this->validate($request, [
        'title' => 'required',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);
    
    
    if($file = $request->file('image')){
            $fileNameToStored = str::random(4).time().'.'.$file->getClientOriginalName();;
            //resize the images
            $img = Image::make($file)
                ->resize(600,315)
                ->save(public_path('albums/'.$fileNameToStored));

                $album = new Album();
                $album->name = $request->title;
                $album->cover_image = $fileNameToStored;
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

            		->where('name','LIKE',"%$search%")

            		->get();

        }


        return response()->json($data);

    
    }
    public function albumidget(Request $request){
        dd($request->all());
    }
}
