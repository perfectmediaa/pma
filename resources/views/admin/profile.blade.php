@extends('layouts.admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/additional-methods.min.js"></script>
@section('content')
<div class="container">
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
    <div class="row">
        <div class="col-sm-6">
          <div class="card">
            <div class="card-body">
                <h5 class="card-title bg-primary text-white">Account</h5>
                <form id="account" method="post" action="javascript:void(0)">
                    @csrf
                    <div class="form-group">
                      <label for="formGroupExampleInput">Name</label>
                      <input type="text" name="name" class="form-control" id="name" value="{{$id->name}}">
                      <span class="text-danger">{{ $errors->first('name') }}</span>
                    </div>
                    <div class="form-group">
                      <label for="email">Email Id</label>
                      <input type="text" name="email" class="form-control" id="email" value="{{$id->email}}">
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
        
                    <input type="text" name="age" id="age" class="form-control" value="{{$id->profile->age}}" >
        
                    </div>
        
                    <div class="form-group">
        
                        <label>Address:</label>
        
                    <input type="text" name="address" id="address" class="form-control" value="{{$id->profile->address}}" >
        
                    </div>
        
                    <div class="form-group">
        
                        <strong>Experience:</strong>
        
                    <input type="textarea" name="experience" id="experience" class="form-control" value="{{$id->profile->experience}}" >
        
                    </div>
        
                    <div class="form-group">
        
                      <button type="submit" id="send_profile" class="btn btn-success">Submit</button>
        
                    </div>
        
                </form>
              </div>
            </div>
          </div>
        <div class="col-sm-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title bg-primary text-white">album</h5>
              <form >

                <div class="form-group">
    
                    <label>Name:</label>
                    @isset($id->album->id)
                <input type="text" name="name" id="name" class="form-control" value="{{$id->album->name}}" >
                 @endisset
                </div>
    
                <div class="form-group">
    
                    <label>Username:</label>
    
                    <input type="text" name="username" class="form-control" >
    
                </div>
    
                <div class="form-group">
    
                    <strong>Image:</strong>
    
                    <input type="file" name="image" class="form-control">
    
                </div>
    
                <div class="form-group">
    
                    <button class="btn btn-success btn-submit">Submit</button>
    
                </div>
    
            </form>
            </div>
          </div>
        </div>
        <div class="col-sm-6">
            <div class="card">
              <div class="card-body">
                  <h5 class="card-title bg-primary text-white">Types</h5>
                  <form >

                    <div class="form-group">
        
                        <label>Name:</label>
        
                        <input type="text" name="name" class="form-control" placeholder="Name" required="">
        
                    </div>
        
                    <div class="form-group">
        
                        <label>Password:</label>
        
                        <input type="password" name="password" class="form-control" placeholder="Password" required="">
        
                    </div>
        
                    <div class="form-group">
        
                        <strong>Email:</strong>
        
                        <input type="email" name="email" class="form-control" placeholder="Email" required="">
        
                    </div>
        
                    <div class="form-group">
        
                        <button class="btn btn-success btn-submit">Submit</button>
        
                    </div>
        
                </form>
              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="card">
              <div class="card-body">
                  <h5 class="card-title bg-primary text-white">Wallet</h5>
                  <form >

                    <div class="form-group">
        
                        <label>Balance:</label>
        
                        <input type="text" name="name" class="form-control" value="{{$id->wallet->balance}}" required="">
        
                    </div>
                    
        
                    <div class="form-group">
        
                        <button class="btn btn-success btn-submit">Submit</button>
        
                    </div>
        
                </form>
              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="card">
              <div class="card-body">
                  <h5 class="card-title bg-primary text-white">Transections</h5>
                  <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">Date</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Type</th>
                        <th scope="col">Note</th>
                        <th scope="col">Status</th>
                      </tr>
                    </thead>
                    <tbody>
                        @if($id->transaction->isEmpty())
            
                            <tr>
                                <td> </td>
                                <td></td>
                                <td> No record Found</td>
                             </tr>
                        @else
                        @foreach ($id->transaction as $tran)
                           <tr>
                        <td>{{$tran->created_at}}</td>
                        <td>{{$tran->amount}}</td>
                        <td>{{$tran->type}}</td>
                        <td>{{$tran->note}}</td>
                        <td><button class="btn btn-success">ok </button></td>
                          </tr> 
                        @endforeach
                        @endif
                    </tbody>
                  </table>
              </div>
            </div>
          </div>
</div>


<script>
  
 $(document).ready(function(){
  $('#send_account').click(function(e){
     e.preventDefault();
     /*Ajax Request Header setup*/
     $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
  
     $('#send_account').html('Sending..');
     
     /* Submit form data using ajax*/
     $.ajax({
        url: "{{route('admin.accountedit',$id->id)}}",
        method: 'post',
        data: $('#account').serialize(),
        success: function(data){
          
              $('#send_account').html('Submit');
              $("#myModal").modal("show");   
            
        },
        error: function (xhr) {
                  $('#err').html('');
                  $.each(xhr.responseJSON.errors, function(key,value) {
                    $('#err').append('<h5>'+value+'</h5>');
                }); 
                $('#send_account').html('Submit');
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
  
     $('#send_profile').html('Sending..');
     
     /* Submit form data using ajax*/
     $.ajax({
        url: "{{route('admin.profileedit',$id->id)}}",
        method: 'post',
        data: $('#profile').serialize(),
        success: function(data){
          
              $('#send_profile').html('Submit');
              $("#myModal").modal("show");   
            
        },
        error: function (xhr) {
                  $('#err').html('');
                  $.each(xhr.responseJSON.errors, function(key,value) {
                    $('#err').append('<h5>'+value+'</h5>');
                }); 
                $('#send_profile').html('Submit');
                $("#myMod").modal("show");

                },

        });
     });
  });
 

 </script>
 @endsection