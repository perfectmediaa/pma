
<link href="{{ asset('css/head.css') }}" rel="stylesheet">
<div class="container text-dark">
    <div class="fb-profile">
        <img align="left" class="fb-image-lg" src="http://www.trendycovers.com/covers/1322932923.jpg" />
    <img align="left" class="fb-image-profile thumbnail" src="/albums/{{empty($user->album->cover_image)? 'pf.jpg' : $user->album->cover_image }}"/>
        <div class="fb-profile-text">
            <h4 class="text-primary">{{$user->name}}</h4>
            @empty($user->bio)
            <p>Hey I am Using Perfect Media .</p> 
            @else
            <p> {{$user->bio}} </p>
            @endempty
        </div>
    </div>
    <div class="row mb-3 px-1">
        <a href="/profile"> Info</a>
    <a class="ml-3"  href="{{route('photos',$user->album->id)}}"> Photos</a>
        <a class="ml-3" href="/videos"> Videos</a>
         
    </div>
</div>
