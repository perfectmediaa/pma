@extends('layouts.app')
<style>
    img{width:100%;}
    h2{
        color: black;
    }
    p{
        color: black;
    }
</style>
@section('content')

<div class="container my-5">
	<div class="row">
		<div class="col-md-9">
		    <div class="row mb-2">
		        <div class="col-md-12">
		            <div class="card">
		                <div class="card-body">
		                    <div class="row">
		                        <div class="col-md-12">
		                            <div class="news-title">
		                                <h2>Highlights from the Louis Vuitton Men’s Spring</h2>
		                            </div>
		                            <div class="news-cats">
		                                <ul class="list-unstyled list-inline mb-1">
		                                    <li class="list-inline-item">
		                                            <i class="fa fa-home text-danger"></i>
    		                                        <small>Perfect Media Academy</small>
		                                    </li>
		                                     <li class="list-inline-item">
		                                            <i class="fa fa-map text-danger"></i>
    		                                        <small>Kathmandu</small> 
		                                    </li>
		                                     <li class="list-inline-item">
		                                            <i class="fa fa-info text-danger"></i>
                                             <small>{{$news->created_at->format('d-m-Y')}}</small>
		                                    </li>
		                                  
		                                    
		                                    
		                                    
		                                </ul>
		                            </div>
		                            <hr>
		                            <div class="news-image">
                                    <img src="/news_img/{{$news->image }}" height="300px"">
		                                
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
                                                    <a href="#" title="Biswajit Saha"><img src="//www.gravatar.com/avatar/021e64775176cc4c7018e5e867f17de2?s=250&d=mm&r=x" alt="Author image" class="rounded-circle" style="width:100px"></a>
                                            </div>
                                            <div class="col">
                                                <div class="auth-title">
                                                    <h4 class="author h4"><a href="#">Ameer Tamang</a></h4>
                                                    <div class="bio text-dark">
                                                        Manager and news supervisor
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
        		            <div class="card-body text-success">
        		                <h5>Recent News</h5>
        		            </div>
        		           </div>
        		      </div>
        		     </div>
		             <div class="list-group ">
                         @foreach ($recent as $item)
                     <a href="{{route('single.news',$item->slug)}}" class="list-group-item list-group-item-action text-primary ">{{$item->title}}</a>
                         @endforeach
                    </div> 
		           </div>
		      </div>
		     </div>
	     </div>
		
	</div>
</div>
@endsection