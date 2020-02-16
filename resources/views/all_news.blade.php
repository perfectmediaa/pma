@extends('layouts.app')
<style>
    img{width:100%;}
</style>
@section('content')

<div class="container">
    <div class="row my-3">
		<div class="col-md-12 text-dark my-3">
		  <h4>Our recent News and Updates</h4>
		</div>
	</div>
	<div class="row">
		<div class="col-md-9">
            @foreach ($news as $item)
            <div class="row mb-2">
		        <div class="col-md-12">
		            <div class="card">
		                <div class="card-body">
		                    <div class="row">
		                        <div class="col-md-4">
		                            <img src="/news_img/{{$item->image}}" class="img-thumbnail">
		                        </div>
		                        <div class="col-md-8">
		                            <div class="news-title">
                                    <a href="{{route('single.news',$item->slug)}}"><h4>{{$item->title}}</h4></a>
		                            </div>
		                            <div class="news-cats">
		                                <ul class="list-unstyled list-inline mb-1">
		                                     <li class="list-inline-item">
		                                            <i class="fa fa-compass text-danger"></i>
                                                    <small>News</small> 
                                                    
		                                    </li>
		                                     <li class="list-inline-item">
		                                            <i class="fa fa-check-circle text-danger"></i>
                                             <small>{{$item->created_at->format('d-m-Y')}}</small>
		                                    </li>
		                                  
		                                    
		                                    
		                                    
		                                </ul>
		                            </div>
		                            <div class="news-content text-dark">
                                       <p>
                                           {!! substr($item->description,0,109) !!}....
                                    </p>
		                            </div>
		                            <div class="news-buttons">
                                        <a href="{{route('single.news',$item->slug)}}"> <button type="button" class="btn btn-outline-danger btn-sm">Read More</button> </a>
		                                
		                            </div>
		                        </div>
		                    </div>
		                </div>
		            </div>
		        </div>
		    </div>   
            @endforeach
		   
		    <div class="d-flex row mb-2 justify-content-end">
		        {!! $news->render() !!}
		    </div>
		</div>
		<div class="col-md-3">
		    <div class="row mb-2">
		      <div class="col-md-12">
		          <div class="card">
		             <div class="row">
        		      <div class="col-md-12">
        		          <div class="card">
        		            <div class="card-body text-dark">
        		                <h5>Advertise</h5>
        		            </div>
        		           </div>
        		      </div>
        		     </div>
		             <div class="list-group">
                      
                    </div> 
		           </div>
		      </div>
		     </div>
	     </div>
		
	</div>
</div>
@endsection