@extends('layouts.app')
<link href="{{ asset('css/all.css') }}" rel="stylesheet">

@section('content')
<div class="container mt-5">
    <h4>Your Videos</h4>
    <div class="row">
        @forelse ($videos as $video)
        <div class="col-lg-3 col-md-4 col-xs-4">
            <a href="{{route('get.video',$video->id)}}">
                <img class="img-thumbnail w-100"
                     src="https://img.youtube.com/vi/{{$video->video}}/0.jpg"
                     alt="album">
            <p class="px-1">{{$video->name}}</p>
            </a>
        </div>
        @empty
        <div class="alert alert-warning my-5">
            <h5><strong class="text-center">Sorry!</strong> No video found</h5> 
         </div>
            
        @endforelse
        
    </div>
</div>
@endsection
