@extends('layouts.app')
<link href="{{ asset('css/all.css') }}" rel="stylesheet">
<style>
    .form-control-borderless {
    border: none;
}

.form-control-borderless:hover, .form-control-borderless:active, .form-control-borderless:focus {
    border: none;
    outline: none;
    box-shadow: none;
}
</style>
@section('content')
<div class="container mt-5">
    <h4>Videos</h4>
    <div class="row justify-content-center my-3">
        <div class="col-12 col-md-10 col-lg-8">
            <form class="card card-sm" action="">
                <div class="card-body row no-gutters align-items-center">
                    <div class="col-auto">
                        <i class="fa fa-search h4 text-body"></i>
                    </div>
                    <!--end of col-->
                    <div class="col">
                        <input class="form-control form-control-lg form-control-borderless" name="search" type="text" placeholder="Search for the videos" required>
                    </div>
                    <!--end of col-->
                    <div class="col-auto">
                        <button class="btn btn-lg btn-success" type="submit">Search</button>
                    </div>
                    <!--end of col-->
                </div>
            </form>
        </div>
        <!--end of col-->
</div>
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
    <div class="d-flex row mb-2 justify-content-end">
        {!! $videos->render() !!}
    </div>
</div>
@endsection
