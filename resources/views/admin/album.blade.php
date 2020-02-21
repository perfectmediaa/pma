@extends('layouts.admin')
@section('content')
<div class="container">
    <h4 class="text-center">Albums</h4>
    <div class="row my-5 justify-content-end">
        <form action="">
          <div class="form-row">
            
            <div class="form-group">
              <select name="search" class="form-control">
                <option value="1">Paid Albums</option>
                <option value="0">Free Albums</option>
              </select>
            </div>
            <div class="col">
              <button type="submit" class="btn btn-success">Search</button>
            </div>
          </div>
        </form>
      </div>
    <div class="row">
        @foreach ($albums as $album)
        <div class="col-lg-3 col-md-4 col-xs-4">
            <a href="{{route('admin.single.albums', $album->id)}}">
                <img class="img-thumbnail w-100"
                     src="/albums/{{$album->cover_image}}"
                     alt="album">
                <div class=" d-flex justify-content-between">
                    <p class="px-1">{{$album->name}}</p>
                
                    @if($album->public == 1) 
                    <p class="text-success">Public</p>
                    @else
                    <p class="text-secondary"> Not Public </p>
                    @endif
               
                </div>
            
            </a>
            
        </div>
        @endforeach
        
    </div>
    <div class="d-flex row mb-2 justify-content-end">
        {{ $albums->render() }}
    </div>
</div>
@endsection