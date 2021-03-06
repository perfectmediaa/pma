@extends('layouts.admin')

<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
 @section('content')
<div class="container">
    @if ($message = Session::get('success'))
    
    <div class="alert alert-success alert-block">
 
        <button type="button" class="close" data-dismiss="alert">×</button>
 
            <strong>{{ $message }}</strong>
 
    </div>
    <br>
    @endif
    <div id="myModal" class="modal fade">
      <div class="modal-dialog modal-confirm">
          <div class="modal-content">
              <div class="modal-header">
                  <h4 class="modal-title">Awesome!</h4>
              </div>
              <div class="modal-body">
                  <p class="text-center">Your operation has been completed.</p>
              </div>
              <div class="modal-footer">
                  <button class="btn btn-success btn-block" data-dismiss="modal">OK</button>
              </div>
          </div>
      </div>
  </div>   

  <div class="row justify-content-end">
  <a href="{{route('admin.all.albums')}}"> <button class="btn btn-success mx-3">All Images</button></a>
  </div>

  <div class="row">
    <div class="col-sm-6">
      <div class="card">
        <div class="card-body">
          <h4 class="py-3 bg-success text-white text-center"> Add New Album </h4>
      <form id="imageUploadForm" action="javascript:void(0)" enctype="multipart/form-data">
  
      <div class="form-group">
  
        <label>Album Title:</label>
  
        <input type="text" name="title" class="form-control" placeholder="Add Title" required>
  
      </div>
      <div class="form-group">
        
        <label>Show in Home Page:</label>

        <select name="show" class="form-control">
          <option value="1">YES</option>
          <option value="0">NO</option>
        </select>

    </div>
  
      <div class="form-group">
  
        <label>Image:</label>
  
        <input type="file" name="image" id="image" class="form-control" required>
  
      </div>
  
  
      <div class="form-group">
  
        <button class="btn btn-success upload-image" id="send_img" type="submit">Upload Image</button>
  
      </div>
  
  
    </form>
        </div>
      </div>
    </div>
    <div class="col-sm-6">
      <div class="card">
        <div class="card-body">
          <h4 class="py-3 bg-primary text-white text-center"> Add New Images to Album </h3> 
     <div class="row justify-content-center">
        
        <div class="form-group pt-5">
    <form id="file-upload-form" class="uploader" action="{{route('admin.photos.store')}}" method="post" accept-charset="utf-8" enctype="multipart/form-data">
        @csrf
        
        <select class="itemName form-control"  name="album"></select> <br> <br>
        <input required type="file" class="form-control" name="images[]" placeholder="address" multiple>
        <span class="text-danger">{{ $errors->first('images') }}</span>
        <div id="thumb-output"></div>
        <br>
        <button type="submit" class="btn btn-primary float-right">Upload Photos</button>
        </form>
     </div>
    </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
       $('.itemName').select2({

placeholder: 'Select an album',

ajax: {

  url: '/admin/albumid',

  dataType: 'json',

  delay: 250,

  processResults: function (data) {

    return {

      results:  $.map(data, function (item) {

            return {

                text: item.name,

                id: item.id

            }

        })

    };

  },

  cache: true

}

});

$(document).ready(function (e) {
     
     $('#imageUploadForm').on('submit',(function(e) {
      $("#send_img").prop('disabled', true);
     $.ajaxSetup({
      
     headers: {
      
       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      
     }
      
     });
      
     e.preventDefault();
      
     var formData = new FormData(this);
      
      
      
     $.ajax({
      
        type:'POST',
      
        url: "{{ route('admin.album')}}",
      
        data:formData,
      
        cache:false,
      
        contentType: false,
      
        processData: false,
      
        success:function(data){
          $("#send_img").prop('disabled', false);
         $("#myModal").modal("show");
         $('#imageUploadForm').trigger("reset");
        },
      
        error: function(data){
      
         window.alert(data.errors);
      
        }
      
     });
      
     }));
      
     });
    </script> 
@endsection

