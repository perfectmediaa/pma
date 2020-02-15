@extends('layouts.app')
<link href="{{ asset('css/all.css') }}" rel="stylesheet">
@section('content')
<div class="container mt-5">
    <h4>Models</h4>
    <div class="row justify-content-center my-3">
        <div class="col-12 col-md-10 col-lg-8">
            <form class="card card-sm" action="">
                <div class="card-body row no-gutters align-items-center">
                    
                    <div class="col-auto">
                        <i class="fa fa-search h4 text-body"></i>
                    </div>
                    <!--end of col-->
                    <div class="col">
                        <input class="form-control form-control-lg form-control-borderless" name="search" type="text" placeholder="Search for the Models" required>
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
        @forelse ($albums as $album)
        <div class="col-lg-3 col-md-4 col-xs-4">
            <a href="{{route('photos',$album->id)}}">
                <img class="img-thumbnail w-100 img-responsive"
                     src="/albums/{{$album->cover_image}}"
                     alt="album" style="width:100%; height:350px">
            
            <p class="px-1">{{$album->name}}</p>
            </a>
        </div>
        @empty
        
        <div class="alert alert-warning my-5">
            <h5><strong class="text-center">Sorry!</strong> No Model found</h5> 
         </div>
            
        @endforelse
        
    </div>
    <div class="d-flex row mb-2 justify-content-end">
        {{ $albums->render() }}
    </div>
</div>
@endsection
