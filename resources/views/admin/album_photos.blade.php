@extends('layouts.admin')
@section('content')
<div class="container">
    @if ($message = Session::get('success'))
    
    <div class="alert alert-success alert-block">
 
        <button type="button" class="close" data-dismiss="alert">×</button>
 
            <strong>{{ $message }}</strong>
 
    </div>
    <br>
    @endif
    @if (count($errors) > 0)

    <div class="alert alert-danger alert-block">
        <button type="button" class="close" data-dismiss="alert">X</button>
    
            @foreach ($errors->all() as $error)

                <p>{{ $error }}</p>

            @endforeach

    </div>

   @endif
   <div class="row justify-content-end my-4">
    <button type="button" class="btn btn-primary mx-3" data-toggle="modal" data-target="#album">
        Update Album
      </button>
      <button type="button" class="btn btn-success" data-toggle="modal" data-target="#photos">
        new Photos
      </button>
   </div>
   <div class="modal fade" id="album" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalCenterTitle">upload Profile Image</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form id="imageUploadForm" action="{{route('admin.album.update', $album->id)}}" enctype="multipart/form-data" method="POST">

                @csrf
              
                  <div class="form-group">
              
                    <label>Album Title:</label>
              
                    <input type="text" name="title" class="form-control" value="{{$album->name}}" required>
              
                  </div>
              
              
                  <div class="form-group">
              
                    <label>Image:</label>
              
                    <input type="file" name="image" id="image" class="form-control" >
              
                  </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button class="btn btn-success upload-image" type="submit"> Upload Image</button>
        </form>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="photos" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalCenterTitle">Upload images</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form id="imageUploadForm" action="{{ route('admin.photos.store')}}" enctype="multipart/form-data" method="POST">

                @csrf
            <input type="hidden" name="album" value="{{$album->id}}" required>
                <h4 class="text-primary mb-4">{{$album->name}}</h4>
                  <div class="form-group">
              
                    <input required type="file" class="form-control" name="images[]" placeholder="images" multiple>
              
                  </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button class="btn btn-success upload-image" type="submit"> Upload Image</button>
        </form>
        </div>
      </div>
    </div>
  </div>
    <div class="row">
        @foreach ($album->images as $image)
        <div class="col-lg-3 col-md-4 col-xs-4">
            
                <img class="img-thumbnail w-100"
                     src="/images/{{$image->image}}"
                     alt="album">
            
        <a href="{{route('photos.delete',$image->id)}}"> <button class="btn btn-danger mx-1">Delete</button></a>
        </div>
        @endforeach
        
    </div>
</div>
@endsection