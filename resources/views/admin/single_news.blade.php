@extends('layouts.app')
<style>
   img{width:100%;}
	.news-image{
    height: 300px;
    border: 1px solid #ddd;
	}
	.news-image img {
    object-fit: fill;
    min-width: 100%;
    min-height: 100%;
    width: auto;
    height: auto;
    max-width: 100%;
    max-height: 100%;
}
</style>
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
									<h2>{{$news->title}}</h2>
		                            </div>
		                            <div class="news-cats">
		                                <ul class="list-unstyled list-inline mb-1">
		                                     <li class="list-inline-item">
		                                            <i class="fa fa-home text-danger"></i>
    		                                        <small>Kathmandu</small> 
		                                    </li>
		                                     <li class="list-inline-item">
		                                            <i class="fa fa-check-circle text-danger"></i>
                                             <small>{{$news->created_at->format('d-m-Y')}}</small>
		                                    </li>
		                                  
		                                    
		                                    
		                                    
		                                </ul>
		                            </div>
		                            <hr>
		                            <div class="news-image">
                                    <img src="/news_img/{{$news->image }}">
		                                
		                            </div>
		                            <div class="news-content text-dark my-2">
                                        
		                                {!! $news->description !!}
		                                
		                            </div>
		                            <hr>
		                            <div class="news-footer">
		                                <div class="news-likes">
                                            
		                                     
		                                </div>
		                            </div>
		                            <hr>
		                            <div class="news-tags">
        
		                                
		                            </div>
		                            <hr>
		                            <div class="news-author">
		                                <div class="row">
                                            <div class="col-md-auto">
												<a href="https://www.facebook.com/perfectmediaacademy/" title="ameer"><img src="/assets/pma_logo.jpg" alt="Author image" class="rounded-circle" style="width:100px"></a>
											</div>
                                            <div class="col">
                                                <div class="auth-title">
                                                    <h4 class="author h4"><a href="#">Perfect Media Academy</a></h4>
                                                    <div class="bio text-dark">
                                                       Best Modeling Academy in Nepal
                                                    </div>
                                                    <ul class="list-unstyled list-inline">
                                                        <li class="list-inline-item"><a href="#" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                                        <li class="list-inline-item"><a href="#" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                                        <li class="list-inline-item"><a href="/" target="_blank"><i class="fa fa-globe"></i></a></li>
                                                        <li class="list-inline-item"><i class="fa fa-map-marker"></i> Kathmandu</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
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
        		            <div class="card-body text-success text-center">
        		                <h5>@if($news->status==1) News is Public
                                    @else News is Private
                                    @endif</h5>
                            </div>
                            <a class="d-flex justify-content-center" href="{{route('admin.news.update',$news->id)}}"> <button class="btn btn-success">Modify This News</button></a>
        		           </div>
        		      </div>
        		     </div>
		           </div>
		      </div>
		     </div>
	     </div>
		
	</div>
</div>
@endsection