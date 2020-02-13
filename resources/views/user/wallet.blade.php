@extends('layouts.app')
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script> 

<script src="https://khalti.com/static/khalti-checkout.js"></script>
@section('content')
<div class="container mt-5">
    <div id="khalti"><button type="button" class="btn btn-primary btn float-right" id="kbtn" data-toggle="modal" data-target="#khalti-modal">Add Balance</button></div>
  <h4 class="text-center">Wallet {{ $wallet->balance}} </h4>
  <br>
  
<div id="khalti-modal" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
                <h3>Add Balance</h3>
				<a class="close" data-dismiss="modal">×</a>
				
			</div>
			<form id="moneyForm" name="money" role="form" action="javascript:void(0)">
				<div class="modal-body">				
					<div class="form-group">
						<label for="name">Amount</label>
						<input type="text" name="amount" id="amount" class="form-control" required>
					</div>					
				</div>
				<div class="modal-footer">					
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success" id="submit"> Submit </button>
				</div>
			</form>
		</div>
	</div>
</div>
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
  <div class="row pt-20" style="padding-top:20px">
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
            <td><button class="btn btn-success">completed </button></td>
              </tr> 
            @endforeach
            @endif
        </tbody>
      </table>
      
  </div>
  <nav aria-label="Page navigation example">
    <ul class="pagination justify-content-end">
        {{ $tranx->links() }}
    </ul>
  </nav>
  
    
    
</div>
<script>
  $(document).ready(function(){	
	$("#moneyForm").submit(function(event){
        submitForm();
        $('#kbtn').prop("disabled", true);
        

	});
});
function submitForm(){
    var tamt = $("#amount").val();
    var amt = tamt*100;
    var data1 = {}
    var _this = $(this);
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var config = {
            // replace the publicKey with yours
            "publicKey": "test_public_key_bb43039ab5a34239ba71fee101052ebe",
            "productIdentity": "1234567890",
            "productName": "Dragon",
            "productUrl": "http://gameofthrones.wikia.com/wiki/Dragons",
            "eventHandler": {
                onSuccess (payload) {
                    $('#kbtn').html('verifying...');
                    $.ajax({
                    url: "{{ route('khalti')}}",
                    method: 'post',
                    data: payload,
                    success: function(data){
                        $('#kbtn').html('Add Balance');
                        $('#kbtn').prop("disabled", false);
                        $("#myModal").modal("show");  
                         location.reload(); 
                        
                    },
                    error: function (xhr) {
                             $('#kbtn').html('Add Balance');
                            $('#kbtn').prop("disabled", false);
                            $('#err').html('');
                            $.each(xhr.responseJSON.errors, function(key,value) {
                                $('#err').append('<h5>'+value+'</h5>');
                            }); 
                            $("#myMod").modal("show");

                            },

                    });

                 
                },
                onError (error) {
                    $('#kbtn').prop("disabled", false);
                    $('#err').html('');
                    $('#err').append('Payment declined');
                    $("#myMod").modal('show');
                },
                onClose () {  
                    $('#kbtn').prop("disabled", false);
                    
                }
            }
        };

        var checkout = new KhaltiCheckout(config);
        
            $("#khalti-modal").modal('hide');
            checkout.show({amount: amt});

}
   
  </script>
@endsection
