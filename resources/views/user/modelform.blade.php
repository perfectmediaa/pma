@extends('layouts.app')
<link href="{{ asset('css/all.css') }}" rel="stylesheet">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script> 
@section('content')
<div class="container mt-5 text-dark">
  @auth 
  <h4 class="text-right text-success mx-2">wallet {{ $wallet->balance}} </h4>
  @endauth
  <h1 class="text-center">Model Registration form </h1>
  <br>
  <div id="myModal" class="modal fade">
    <div class="modal-dialog modal-confirm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Awesome!</h4>
            </div>
            <div class="modal-body">
                <p class="text-center" id="sms">Your operation has been completed.</p>
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
  <form id="contact_us" method="post" action="javascript:void(0)">
    <div class="form-row">
      <div class="col-md-4 mb-3">
        <label for="validationServer013">Full name</label>
        <input type="text" class="form-control " id="validationServer013" placeholder="First name"
        name="name" required>
        
      </div>
      <div class="col-md-4 mb-3">
        <label for="validationServer023">address</label>
        <input type="text" class="form-control " id="validationServer023" placeholder="Last name"
         name="address" required>
        
      </div>
      <div class="col-md-4 mb-3">
        <label for="validationServerUsername33">Mobile</label>
        <div class="input-group">
          
          <input type="text" class="form-control " id="validationServerUsername33" placeholder="Username"
            aria-describedby="inputGroupPrepend33" required>
          
        </div>
      </div>
    </div>
    <div class="form-row">
      <div class="col-md-6 mb-3">
        <label for="validationServer033">City</label>
        <input type="text" class="form-control" id="validationServer033" placeholder="City"
          required>
        
      </div>
      <div class="col-md-3 mb-3">
        <label for="validationServer043">State</label>
        <input type="text" class="form-control " id="validationServer043" placeholder="State"
          required>
      </div>
      <div class="col-md-3 mb-3">
        <label for="validationServer053">Zip</label>
        <input type="text" class="form-control " id="validationServer053" placeholder="Zip"
          required>
        
      </div>
    </div>
    <div class="form-group">
      <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input " id="invalidCheck33" required>
        <label class="custom-control-label" for="invalidCheck33">Agree to terms and conditions</label>
        <div class="invalid-feedback">
          You must agree before submitting.
        </div>
      </div>
      
    </div>
    @auth
    <button class="btn btn-primary" type="submit" id="send_form">Submit form</button>
    @endauth
    
  </form>
  @guest
  <a href="/login"> <button class="btn btn-danger"> Login to submit form</button></a>
  @endguest
  
    
    
</div>
<script>
  //-----------------
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
        url: "{{ route('formStore')}}",
        method: 'post',
        data: $('#contact_us').serialize(),
        success: function(data){
          
              $('#send_form').html('Submit');
              $("#myModal").modal("show");   
            
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
