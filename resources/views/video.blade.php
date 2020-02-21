


@extends('layouts.app')

@section('content')

<div class="container my-5 text-dark">
	<div class="row">
		<div class="col-md-9">
		    <div class="row mb-2">
		        <div class="col-md-12">
		            <div class="card">
		                <div class="card-body">
		                    <div class="row">
		                        <div class="col-md-12">
		                            <div class="news-title">
									<h3>{{$video->name}}</h3>
		                            </div>
		                            <div class="news-cats">
		                                <ul class="list-unstyled list-inline mb-1">
		                                     <li class="list-inline-item">
		                                            <i class="fa fa-home text-danger"></i>
    		                                        <small>Pefect Media</small> 
		                                    </li>
		                                     <li class="list-inline-item">
		                                            <i class="fa fa-check-circle text-danger"></i>
                                             <small>Academy</small>
		                                    </li>
		                                  
		                                    
		                                    
		                                    
		                                </ul>
		                            </div>
		                            <hr>
		                            <div class="news">
                                  <div class=" embed-responsive embed-responsive-16by9">
                                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{{$video->video}}?rel=0" allowfullscreen></iframe>
                                  </div>
		                                
		                            </div>
		                            <div class="news-content text-dark my-2">
                                        
		                                Video Descricption
		                                
		                            </div>
		        
		                            
		                        </div>
		                    </div>
		                </div>
		            </div>
		        </div>
		    </div>
		    
		</div>
		<div class="col-md-3">
		    <div class="row mb-2">
		      <div class="col-md-12">
		          <div class="card">
		             <div class="row">
        		      <div class="col-md-12">
        		          <div class="card">
        		            <div class="card-body text-success">
        		                <h5>Advertise</h5>
        		            </div>
        		           </div>
        		      </div>
        		     </div>
		             <div class="list-group ">
                        
                    </div> 
		           </div>
		      </div>
		     </div>
	     </div>
		
	</div>
</div>
@endsection