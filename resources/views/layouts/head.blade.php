
<link href="{{ asset('css/head.css') }}" rel="stylesheet">
<div class="container text-dark">
    <div class="fb-profile">
        <img align="left" class="fb-image-lg" src="http://www.trendycovers.com/covers/1322932923.jpg" />
    <img align="left" class="fb-image-profile thumbnail" src="/albums/{{empty($user->album->cover_image)? 'default.jpg' : $user->album->cover_image }}"/>
        <div class="fb-profile-text">
        <h1>{{$user->name}}</h1>
            <p>Hey I am Using Perfect Media .</p>
        </div>
    </div>
    <div class="row mb-3 px-1">
        <a href="/profile"> Info</a>
    <a class="ml-3"  href="{{route('photos',$user->album->id)}}"> Photos</a>
        <a class="ml-3" href="/videos"> Videos</a>
         
    </div>
</div>
