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
    <h3> Add New Album </h3>
    <div class="row pt-20">
    <form id="imageUploadForm" action="javascript:void(0)" enctype="multipart/form-data">
  
  
        <div class="alert alert-danger print-error-msg" style="display:none">
  
          <ul></ul>
  
      </div>
  
  
      <div class="form-group">
  
        <label>Alt Title:</label>
  
        <input type="text" name="title" class="form-control" placeholder="Add Title">
  
      </div>
  
  
      <div class="form-group">
  
        <label>Image:</label>
  
        <input type="file" name="image" id="image" class="form-control">
  
      </div>
  
  
      <div class="form-group">
  
        <button class="btn btn-success upload-image" type="submit">Upload Image</button>
  
      </div>
  
  
    </form>

</div>
<h3> Add New Photos to Album </h3> 
     <div class="row my-100">
        
        <div class="form-group">
    <form id="file-upload-form" class="uploader" action="/update" method="post" accept-charset="utf-8" enctype="multipart/form-data">
        @csrf
        
        <select class="itemName form-control" style="width:500px;" name="album"></select>
        <input required type="file" class="form-control" name="images[]" placeholder="address" multiple>
        <span class="text-danger">{{ $errors->first('images') }}</span>
        <div id="thumb-output"></div>
        <br>
        <button type="submit" class="btn btn-primary">Upload</button>
        </form>
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
         $("#imageUploadForm").trigger("reset");
         window.alert(data.success);
        },
      
        error: function(data){
      
         window.alert(data.errors);
      
        }
      
     });
      
     }));
      
     });
    </script> 
@endsection















