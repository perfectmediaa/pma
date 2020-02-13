@extends('layouts.app')
<link href="{{ asset('css/all.css') }}" rel="stylesheet">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script> 
@section('content')
@include('user.head')

<div class="container mt-5">
  <div class="d-flex justify-content-end">
    <a href="/info"><button class="btn btn-primary"> Back to Profile</button></a>

  </div>
  
  <br>
    <div class="row">
        <div class="col-sm-6">
          <div class="card">
            <div class="card-body">
                <h5 class="card-title bg-primary text-white">Account</h5>
                <form id="account" method="post" action="javascript:void(0)">
                    @csrf
                    <div class="form-group">
                      <label for="formGroupExampleInput">Name</label>
                      <input type="text" name="name" class="form-control" id="name" value="{{$user->name}}">
                      <span class="text-danger">{{ $errors->first('name') }}</span>
                    </div>
                    <div class="form-group">
                      <label for="email">Email Id</label>
                      <input type="text" name="email" class="form-control" id="email" value="{{$user->email}}">
                      <span class="text-danger">{{ $errors->first('email') }}</span>
                    </div>      
                    <div class="form-group">
                      <label for="mobile_number">Password</label>
                      <input type="text" name="mobile_number" class="form-control" id="mobile_number" placeholder="Please enter mobile number" maxlength="10">
                      <span class="text-danger">{{ $errors->first('mobile_number') }}</span>
                    </div>
                    <div class="alert alert-success d-none" id="msg_div">
                            <span id="res_message"></span>
                    </div>
                    <div class="form-group">
                     <button type="submit" id="send_account" class="btn btn-success">Submit</button>
                    </div>
                  </form>
            </div>
          </div>
        </div>
        <div class="col-sm-6">
            <div class="card">
              <div class="card-body">
                  <h5 class="card-title bg-primary text-white">Profile</h5>
                  <form id="profile" method="post" action="javascript:void(0)">

                    <div class="form-group">
        
                        <label>Age:</label>
        
                    <input type="text" name="age" id="age" class="form-control" value="{{$user->profile->age}}" >
        
                    </div>
        
                    <div class="form-group">
        
                        <label>Address:</label>
        
                    <input type="text" name="address" id="address" class="form-control" value="{{$user->profile->address}}" >
        
                    </div>
        
                    <div class="form-group">
        
                        <strong>Experience:</strong>
        
                    <input type="textarea" name="experience" id="experience" class="form-control" value="{{$user->profile->experience}}" >
        
                    </div>
        
                    <div class="form-group">
        
                      <button type="submit" id="send_profile" class="btn btn-success">Submit</button>
        
                    </div>
        
                </form>
              </div>
            </div>
          </div>
        
    </div>     
    
    
    
    
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
        url: "{{ url('jquery-ajax-form-submit')}}",
        method: 'post',
        data: $('#contact_us').serialize(),
        success: function(response){
           //------------------------
              $('#send_form').html('Submit');
              $('#res_message').show();
              $('#res_message').html(response.msg);
              $('#msg_div').removeClass('d-none');
  
              document.getElementById("contact_us").reset(); 
              setTimeout(function(){
              $('#res_message').hide();
              $('#msg_div').hide();
              },10000);
           //--------------------------
        }});
     });
  });
  //-----------------
  </script>
@endsection
