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
  <div id="myMod" class="modal fade">
    <div class="modal-dialog modal-confirm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Opps!</h4>
            </div>
            <div class="modal-body">
                <p class="text-center" id="err"></p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-danger btn-block" data-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
  </div>
  <div class="row justify-content-end">
    <a href="{{route('admin.all.videos')}}"> <button class="btn btn-success mx-3">All videos</button></a>
  </div>    

  <div class="row">
    <div class="col-sm-6">
      <div class="card">
        <div class="card-body">
          <h4 class="py-3 bg-success text-white text-center"> Add New video </h4>
      <form id="VideoUploadForm" action="javascript:void(0)" enctype="multipart/form-data">
  
      <div class="form-group">
  
        <label>Video Title:</label>
  
        <input type="text" name="name" class="form-control" required>
  
      </div>
  
  
      <div class="form-group">
  
        <label>Youtube Url:</label>
  
        <input type="url" name="url" class="form-control" required>
  
      </div>
  
  
      <div class="form-group">
  
        <button class="btn btn-success upload-image" id="send_form" type="submit">Submit</button>
  
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

$(document).ready(function(){
  $('#send_form').click(function(e){
     e.preventDefault();
     /*Ajax Request Header setup*/
     $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
  
     $('#send_form').html('Sending..');
     
     /* Submit form data using ajax*/
     $.ajax({
        url: "{{ route('admin.video.store')}}",
        method: 'post',
        data: $('#VideoUploadForm').serialize(),
        success: function(data){
          
              $('#send_form').html('Submit');
              $("#myModal").modal("show");
              $('#VideoUploadForm').trigger("reset");   
            
        },
        error: function (xhr) {
                  $('#err').html('');
                  $.each(xhr.responseJSON.errors, function(key,value) {
                    $('#err').append('<h5>'+value+'</h5>');
                }); 
                $('#send_form').html('Submit');
                $("#myMod").modal("show");

                },

        });
     });
  });
    </script> 
@endsection

