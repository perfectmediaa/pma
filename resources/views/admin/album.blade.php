@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row">
        @foreach ($albums as $album)
        <div class="col-lg-3 col-md-4 col-xs-4">
            <a href="{{route('admin.single.albums', $album->id)}}">
                <img class="img-thumbnail w-100"
                     src="/albums/{{$album->cover_image}}"
                     alt="album">
            <p class="px-1">{{$album->name}}</p>
            </a>
            
        </div>
        @endforeach
        
    </div>
</div>
@endsection