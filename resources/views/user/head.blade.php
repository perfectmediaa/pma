
<link href="{{ asset('css/head.css') }}" rel="stylesheet">
<div class="container text-dark">
    <div class="fb-profile">
        <img align="left" class="fb-image-lg" src="http://www.trendycovers.com/covers/1322932923.jpg" />
    <img align="left" class="fb-image-profile thumbnail" src="/albums/Jzu81581515832.IMG_0289.jpg"/>
        <div class="fb-profile-text">
        <h1>{{$user->name}}</h1>
            <p>Hey I am Using Perfect Media .</p>
        </div>
    </div>
    <div class="row mb-3 px-1">
        <a href="/profile"> Info</a>
        <a class="ml-3"  href="/profile/photos"> Photos</a>
        <a class="ml-3" href="/videos"> Videos</a>
        <a class="ml-3" href="/wallet"> Wallet</a>
        <a class="ml-3" href="/profile/update"> Setting</a>
         
    </div>
</div>
