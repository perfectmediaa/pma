@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row my-3">
		<div class="col-md-12 text-dark my-3 d-flex justify-content-between">
          <h4 class="text-center">All News</h4>
        <a href="{{route('admin.news.create')}}"><button class="btn btn-primary">Add News</button></a>
        </div>
    </div>
    @if ($message = Session::get('success'))
    
    <div class="alert alert-success alert-block">
 
        <button type="button" class="close" data-dismiss="alert">×</button>
 
            <strong>{{ $message }}</strong>
 
    </div>
    <br>
    @endif
    @if (count($errors) > 0)

    <div class="alert alert-danger alert-block">
        <button type="button" class="close" data-dismiss="alert">X</button>
    
            @foreach ($errors->all() as $error)

                <p>{{ $error }}</p>

            @endforeach

    </div>
   @endif
	<div class="row">
		<div class="col-md-12">
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
		                            <div class="d-flex news-title justify-content-between">
                                    <a href="{{route('admin.news.view',$item->id)}}"><h4>{{$item->title}}</h4></a>
                                    <p class="text-right text-success">
                                        @if($item->status==1) Public
                                        @else Private
                                        @endif
                                    </p>
		                            </div>
		                            <div class="news-cats">
		                                <ul class="list-unstyled list-inline mb-1">
		                                    <li class="list-inline-item">
		                                            <i class="fa fa-home text-danger"></i>
    		                                        <small>Perfect Media</small> 
		                                    </li>
		                                     <li class="list-inline-item">
		                                            <i class="fa fa-compass text-danger"></i>
                                                    <small>News</small> 
                                                    
		                                    </li>
		                                     <li class="list-inline-item">
		                                            <i class="fa fa-folder-o text-danger"></i>
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
                                        <a href="{{route('admin.news.view',$item->id)}}"> <button type="button" class="btn btn-outline-danger btn-sm">Read More</button> </a>
                                    <a href="{{route('admin.news.update',$item->id)}}"> <button class="btn btn-secondary btn-sm mx-3 ">Modify</button></a>
                                        <a href="{{route('admin.news.delete',$item->id)}}"> <button class="btn btn-danger btn-sm float-right">Remove</button></a>
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
</div>
@endsection