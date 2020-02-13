@extends('layouts.admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

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
   
    <div class="row">
        @foreach ($videos as $video)
        <div class="col-lg-3 col-md-4 col-xs-4">
                <img class="img-thumbnail w-100"
                     src="https://img.youtube.com/vi/{{$video->video}}/0.jpg"
                     alt="album">
            <p class="mx-2">{{$video->name}}</p>
            
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#album">
                update
            </button>
            <a href="{{route('admin.video.delete', $video->id)}}">
                <button type="button" class="btn btn-danger mx-2 ">
                delete
                </button>
            </a>
            
        </div>
        @endforeach
        <div class="modal fade" id="album" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalCenterTitle">Update</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    <form id="imageUploadForm" action="{{route('admin.video.update', $video->id)}}" enctype="multipart/form-data" method="POST">
        
                        @csrf
                      
                          <div class="form-group">
                      
                            <label>video Title:</label>
                      
                            <input type="text" name="name" class="form-control" value="{{$video->name}}">
                      
                          </div>
                      
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button class="btn btn-success upload-image" type="submit"> Update</button>
                </form>
                </div>
              </div>
            </div>
          </div>
    </div>
</div>
<script>
    
</script>
@endsection