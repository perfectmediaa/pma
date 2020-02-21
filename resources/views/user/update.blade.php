@extends('layouts.app')
<link href="{{ asset('css/all.css') }}" rel="stylesheet">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script> 
@section('content')
@include('user.head')

<div class="container my-3 text-dark">
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
                <a href=""><button class="btn btn-success btn-block" data-dismiss="modal">OK</button></a>
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
  <br>
    <div class="row">
        <div class="col-sm-6">
          <div class="card">
            <div class="card-body">
                <h5 class="card-title bg-primary text-white">Account</h5>
                <form id="account" method="post" action="javascript:void(0)">
                    @csrf
                    <div class="form-group">
                      <label for="formGroupExampleInput">Full Name</label>
                      <input type="text" name="name" class="form-control" id="name" value="{{$user->name}}">
                     
                    </div>
                    <div class="form-group">
                      <label for="email">Email Id</label>
                      <input type="text" name="email" class="form-control" id="email" value="{{$user->email}}">
                      
                    </div>      
                    <div class="form-group">
                      <label for="mobile_number">Mobile</label>
                      <h5  class="form-control"> {{$user->mobile}} </h5>
                    </div>
                    <div class="form-group">
                      <label>City:</label>
                      <input type="text" name="city" id="city" class="form-control" value="{{$user->city}}" maxlength="30">
                    </div>
                    <div class="form-group">
                      <label>Bio</label>
                      <input type="text" class="form-control" name="bio" value="{{$user->bio}}" maxlength="60">
                    </div>
                    <div class="form-group">
        
                      <label>Gender:</label>
      
                      <select name="gender" class="form-control">
                        <option value="" @if($user->gender=="") selected @endif>Not set</option>
                        <option value="1"  @if($user->gender==1) selected @endif>Male</option>
                        <option value="2"  @if($user->gender==2) selected @endif>Female</option>
                      </select>
      
                  </div>
                    <div class="alert alert-success d-none" id="msg_div">
                            <span id="res_message"></span>
                    </div>
                    <div class="form-group">
                     <button type="submit" id="send_account" class="btn btn-success float-right btn-sm">Save</button>
                    </div>
                  </form>
            </div>
          </div>

            <div class="card">
      
                <div class="card-header text-center">Change Password</div>
                <div class="card-body">
      
                    <form id="pass_change" method="POST" action="javascript:void(0)">
      
                        @csrf 
      
                        <div class="form-group">
      
                            <label> Currnet Password</label>
      
                                <input id="password" type="password" class="form-control" name="current_password" autocomplete="current-password">

      
                        </div>
      
      
      
                        <div class="form-group ">
      
                            <label>New Password</label>
                              <input id="new_password" type="password" class="form-control" name="new_password" autocomplete="current-password">
      
                        </div>
      
                        <div class="form-group ">
                            <label>New Confirm Password</label>
                          
                                <input id="confirm_password" type="password" class="form-control" name="confirm_password" autocomplete="current-password">
                          
                        </div>
                        <div class="form-group row mb-0">
      
                            <div class="col-md-8 offset-md-4">
      
                                <button type="submit" id="pass_form" class="btn btn-success float-right">
      
                                    save
      
                                </button>
      
                            </div>
      
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
        
                    <input type="text" name="age" id="age" class="form-control" value="{{$user->profile->age}}" maxlength="2">
        
                    </div>
        
                    <div class="form-group">
                        <label>Hair Color:</label>
                        <input type="text" name="hair" id="hair" class="form-control" value="{{$user->profile->hair}}" >
                    </div>
                    <div class="form-group">
                      <label>Height:</label>
                      <input type="text" name="height" id="height" class="form-control" value="{{$user->profile->height}}" >
                    </div>
                    <div class="form-group">
                      <label>Eyes Color:</label>
                      <input type="text" name="eyes" id="eyes" class="form-control" value="{{$user->profile->eyes}}" >
                    </div>
                    <div class="form-group">
                      <label>Weight:</label>
                      <input type="text" name="weight" id="weight" class="form-control" value="{{$user->profile->weight}}" maxlength="3">
                    </div>
                    <div class="form-group">
                      <label>Mobile:</label>
                      <input type="text" name="mobile" id="mobile" class="form-control" value="{{$user->profile->mobile}}" >
                    </div>
                    <div class="form-group">
                      <label>Interests:</label>
                      <input type="text" name="interest" id="interest" class="form-control" value="{{$user->profile->interest}}" >
                    </div>
                    <div class="form-group">
        
                      <label>Address:</label>
      
                  <input type="text" name="address" id="address" class="form-control" value="{{$user->profile->address}}" maxlength="70">
      
                  </div>
                  <div class="form-group">
                    <label for="exp">Experience</label>
                    <textarea class="form-control" name="experience" id="experience" rows="3" maxlength="600">{{$user->profile->experience}}</textarea>
                  </div>
        
                    <div class="form-group">
        
                      <button type="submit" id="send_profile" class="btn btn-success float-right btn-sm">Save</button>
        
                    </div>
        
                </form>
              </div>
            </div>
          </div>
        
    </div>     
    
   
    
    
</div>
<script>
  $(document).ready(function(){
  $('#pass_form').click(function(e){
     e.preventDefault();
     /*Ajax Request Header setup*/
     $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
  
     $('#pass_form').html('Updating..');
     
     /* Submit form data using ajax*/
     $.ajax({
        url: "{{ route('User.pass.change')}}",
        method: 'post',
        data: $('#pass_change').serialize(),
        success: function(data){
          
              $('#pass_form').html('Save');
              $('#pass_change').trigger("reset");
              $("#myModal").modal("show");   
            
        },
        error: function (xhr) {
                  $('#err').html('');
                  $.each(xhr.responseJSON.errors, function(key,value) {
                    $('#err').append('<h5>'+value+'</h5>');
                }); 
                $('#pass_form').html('Save');
                $("#myMod").modal("show");

                },

        });
     });
  });
  
    $(document).ready(function(){
    $('#send_account').click(function(e){
       e.preventDefault();
       /*Ajax Request Header setup*/
       $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
    
       $('#send_account').html('Updating..');
       
       /* Submit form data using ajax*/
       $.ajax({
          url: "{{ route('User.account.update')}}",
          method: 'post',
          data: $('#account').serialize(),
          success: function(data){
            
                $('#send_account').html('Save');
                $("#myModal").modal("show");   
              
          },
          error: function (xhr) {
                    $('#err').html('');
                    $.each(xhr.responseJSON.errors, function(key,value) {
                      $('#err').append('<h5>'+value+'</h5>');
                  }); 
                  $('#send_account').html('Save');
                  $("#myMod").modal("show");
  
                  },
  
          });
       });
    });
    
    $(document).ready(function(){
    $('#send_profile').click(function(e){
       e.preventDefault();
       /*Ajax Request Header setup*/
       $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
    
       $('#send_profile').html('Updating..');
       
       /* Submit form data using ajax*/
       $.ajax({
          url: "{{ route('User.profile.update')}}",
          method: 'post',
          data: $('#profile').serialize(),
          success: function(data){
            
                $('#send_profile').html('Save');
                $("#myModal").modal("show");   
              
          },
          error: function (xhr) {
                    $('#err').html('');
                    $.each(xhr.responseJSON.errors, function(key,value) {
                      $('#err').append('<h5>'+value+'</h5>');
                  }); 
                  $('#send_profile').html('Save');
                  $("#myMod").modal("show");
  
                  },
  
          });
       });
    });
    </script>
@endsection
