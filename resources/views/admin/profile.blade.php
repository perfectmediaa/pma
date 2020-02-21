@extends('layouts.admin')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
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
                <form id="account" action="javascript:void(0)">
                    @csrf
                    <div class="form-group">
                      <label for="formGroupExampleInput">Name</label>
                      <input type="text" name="name" class="form-control" id="name" value="{{$user->name}}">
                      
                    </div>
                    <div class="form-group">
                      <label for="email">Email Id</label>
                      <input type="text" name="email" class="form-control" id="email" value="{{$user->email}}">
                      
                    </div>      
                    <div class="form-group">
                      <label for="mobile">Mobile</label>
                      <input type="text" name="mobile" class="form-control" id="mobile" value="{{$user->mobile}}"  maxlength="10">
                      
                    </div>
                    <div class="form-group">
                      <label>City:</label>
                      <input type="text" name="city" id="city" class="form-control" value="{{$user->city}}" >
                    </div>
                    <div class="form-group">
                      <label for="exp">Bio</label>
                      <textarea class="form-control" name="bio" id="bio" rows="3" >{{$user->bio}}</textarea>
                    </div>
                    <div class="form-group">
        
                      <label>Gender:</label>
      
                      <select name="gender" class="form-control">
                        <option value="" @if($user->gender=="") selected @endif>Not set</option>
                        <option value="1"  @if($user->gender==1) selected @endif>Male</option>
                        <option value="2"  @if($user->gender==2) selected @endif>Female</option>
                      </select>
      
                  </div>
                    <div class="form-group ">
      
                      <label>Change Password</label>
                        <input id="password" type="password" class="form-control" name="password">

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
                  <form id="profile" action="javascript:void(0)">
                    @csrf
                    <div class="form-group">
        
                        <label>Age:</label>
        
                    <input type="text" name="age" id="age" class="form-control" value="{{$user->profile->age}}" >
        
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
                      <input type="text" name="weight" id="weight" class="form-control" value="{{$user->profile->weight}}" >
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
      
                  <input type="text" name="address" id="address" class="form-control" value="{{$user->profile->address}}" >
      
                  </div>
                  <div class="form-group">
                    <label for="exp">Experience</label>
                    <textarea class="form-control" name="experience" id="experience" rows="3" >{{$user->profile->experience}}</textarea>
                  </div>
        
                    <div class="form-group">
        
                      <button type="submit" id="send_profile" class="btn btn-success float-right btn-sm">Save</button>
        
                    </div>
        
                </form>
              </div>
            </div>
          </div>
        <div class="col-sm-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title bg-primary text-white">album</h5>
              <form id="album" action="javascript:void(0)" enctype="multipart/form-data">
                <div class="form-row">
                  <label>Display On Home:</label>
                  <select name="public" class="form-control">
                    <option value="1" @if ($user->album->public==1)
                      selected @endif
                    >YES</option>
                    <option value="0" @if($user->album->public==0) selected @endif>NO</option>
                    
                  </select>
                </div>
                <div class="form-row">
                  <label>Searchable:</label>
                  <select name="status" class="form-control">
                    <option value="1" @if($user->album->status==1) selected @endif>YES</option>
                    <option value="0"@if($user->album->status==0) selected @endif>NO</option>
                  </select>
                </div>
                <div class="form-group">
            
                  <label>Album Title:</label>
            
                  <input type="text" name="title" value="{{$user->album->name}}" class="form-control" placeholder="Add Title" required>
            
                </div>
            
            
            
                <div class="form-group">
            
                  <label>Image:</label>
            
                  <input type="file" name="image" id="image" class="form-control" >
            
                </div>
            
            
                <div class="form-group">
            
                  <button class="btn btn-success upload-image" id="send_album" type="submit">Save</button>
            
                </div>
            
            
              </form>
            </div>
          </div>
        </div>
        <div class="col-sm-6">
            <div class="card">
              <div class="card-body">
                  <h5 class="card-title bg-primary text-white">Types</h5>
                  <form id="type" action="javascript:void(0)" >

                    <div class="form-group">
                      <label>Membership:</label>
                      
                        <select name="type" class="form-control">
                          <option value="1" @if($user->type==1) selected @endif>Free Member</option>
                          <option value="2"@if($user->type==3) selected @endif>Form filled Members</option>
                          <option value="3"@if($user->type==3) selected @endif> Paid Members</option>
                          <option value="4"@if($user->type==4) selected @endif>Our Members</option>
                        </select>
        
                    </div>
        
                    <div class="form-group">
        
                        <label>Paid Member:</label>
        
                        <select name="paid" class="form-control">
                          <option value="1  @if($user->paid==1) selected @endif">Paid</option>
                          <option value="0"  @if($user->paid==0) selected @endif>Free</option>
                        </select>
        
                    </div>
        
        
        
                    <div class="form-group">
        
                        <button id="send_type" class="btn btn-success btn-submit">Submit</button>
        
                    </div>
        
                </form>
              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="card">
              <div class="card-body">
                  <h5 class="card-title bg-primary text-white">Wallet</h5>
                  <form id="wallet" action="javascript:void(0)" >

                    <div class="form-group">
        
                        <label>Balance:</label>
        
                        <h3> {{$user->wallet->balance}} </h3>
        
                    </div>
                    <div class="form-group">
        
                      <label>Add Balance:</label>
      
                      <input type="text" name="add_amount" class="form-control" placeholder="amount" >
      
                  </div>
                  <div class="form-group">
        
                    <label>Reduce Balance:</label>
    
                    <input type="text" name="minus_amount" class="form-control" placeholder="amount" >
    
                </div>
                <div class="form-group">
        
                  <label>Note:</label>
  
                  <input type="text" name="note" class="form-control" placeholder="Note" required="Note is required">
  
              </div>
                    
        
                    <div class="form-group">
        
                        <button class="btn btn-success btn-submit float-right" id="wallet_send">Submit</button>
        
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
                        @if($tranx->isEmpty())
            
                            <tr>
                                <td> </td>
                                <td></td>
                                <td> No record Found</td>
                             </tr>
                        @else
                        @foreach ($tranx as $tran)
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
            <div aria-label="Page navigation example">
              <ul class="pagination justify-content-end">
                  {{ $tranx->links() }}
              </ul>
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
        url: "{{route('admin.accountedit',$user->id)}}",
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
        url: "{{route('admin.profileedit',$user->id)}}",
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
 
  $(document).ready(function(){
  $('#wallet_send').click(function(e){
     e.preventDefault();
     /*Ajax Request Header setup*/
     $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
  
     $('#send_wallet').html('Sending..');
     
     /* Submit form data using ajax*/
     $.ajax({
        url: "{{route('admin.profile.wallet',$user->id)}}",
        method: 'post',
        data: $('#wallet').serialize(),
        success: function(data){
          
              $('#send_wallet').html('Submit');
              $('#wallet').trigger("reset");
              $("#myModal").modal("show");   
              setTimeout(function(){// wait for 5 secs(2)
                  location.reload(); // then reload the page.(3)
              }, 2000);
            
        },
        error: function (xhr) {
                  $('#err').html('');
                  $.each(xhr.responseJSON.errors, function(key,value) {
                    $('#err').append('<h5>'+value+'</h5>');
                }); 
                $('#send_wallet').html('Submit');
                $("#myMod").modal("show");

                },

        });
     });
  });

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
     
     $('#album').on('submit',(function(e) {
      
     $.ajaxSetup({
      
     headers: {
      
       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      
     }
      
     });
      
     e.preventDefault();
      
     var formData = new FormData(this);
      
      
      
     $.ajax({
      
        type:'POST',
      
        url: "{{ route('admin.profile.album', $user->id)}}",
      
        data:formData,
      
        cache:false,
      
        contentType: false,
      
        processData: false,
      
        success:function(data){
         
         
          $('#send_album').html('Submit');
              $("#myModal").modal("show");   
              
        },
      
        error: function(xhr){
      
          $('#err').html('');
                  $.each(xhr.responseJSON.errors, function(key,value) {
                    $('#err').append('<h5>'+value+'</h5>');
                }); 
                $('#send_album').html('Submit');
                $("#myMod").modal("show");
      
        }
      
     });
      
     }));
      
     });

     $(document).ready(function(){
  $('#send_type').click(function(e){
     e.preventDefault();
     /*Ajax Request Header setup*/
     $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
  
     $('#send_type').html('Sending..');
     
     /* Submit form data using ajax*/
     $.ajax({
        url: "{{route('admin.profile.type',$user->id)}}",
        method: 'post',
        data: $('#type').serialize(),
        success: function(data){
          
              $('#send_type').html('Submit');
              $("#myModal").modal("show");   
            
        },
        error: function (xhr) {
                  $('#err').html('');
                  $.each(xhr.responseJSON.errors, function(key,value) {
                    $('#err').append('<h5>'+value+'</h5>');
                }); 
                $('#send_type').html('Submit');
                $("#myMod").modal("show");

                },

        });
     });
  });
 </script>
 @endsection