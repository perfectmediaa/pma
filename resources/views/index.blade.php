@extends('layouts.app')
<link href="{{ asset('css/home.css') }}" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="{{ asset('js/home.js') }}" defer></script>
@section('content')
     <div class="row w-100" style="height:350px;
    overflow:hidden;">
          
            <img src="https://smartslider3.com/wp-content/uploads/slider286/fullwidthbg2.jpg" alt="test" class="img-responsive" style="width:100%">
  
</div>
<div class="container text-center">
    <h1>Latest model</h1>
        <div class="row">
            <div class="MultiCarousel" data-items="1,2,3,4" data-slide="1" id="MultiCarousel"  data-interval="1000">
                <div class="MultiCarousel-inner">
    
                    @foreach ($images as $image)
                    <div class="item">
                        <div class="pad15">
                        <a href="
                        {{route('photos')}}"> <img class="img-thumbnail" src="/public/images/{{$image->image}}" alt="image" style="width:100%; height:250px"/></a> 
                        </div>
                    </div>
                    @endforeach
    
                </div>
                <button class="btn btn-primary leftLst"><</button>
                <button class="btn btn-primary rightLst">></button>
            </div>
       </div> 
    
<h1> Latest Videos </h1>
       <div class="row">
            <div class="MultiCarousel" data-items="1,2,3,4" data-slide="1" id="MultiCarousel"  data-interval="1000">
                <div class="MultiCarousel-inner">

                    @foreach ($images as $image)
                    <div class="item">
                        
                        <div class="pad15">
    
                        
                                <a href="/video">
                                <img src="https://img.youtube.com/vi/VU4NtEnUXnc/0.jpg" alt="videos" style="width:100%; height:250px">
                              
                            </a>
                        </div>
                    
                    </div>
                    @endforeach

                </div>
                <button class="btn btn-primary leftLst"><</button>
                <button class="btn btn-primary rightLst">></button>
            </div>
       </div>
<h1>New Faces</h1>
    

</div>
  
@endsection