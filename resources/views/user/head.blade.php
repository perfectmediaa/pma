
<link href="{{ asset('css/head.css') }}" rel="stylesheet">
<div class="container">
    <div class="fb-profile">
        <img align="left" class="fb-image-lg" src="http://www.trendycovers.com/covers/1322932923.jpg" alt="Profile image example"/>
        <img align="left" class="fb-image-profile thumbnail" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRLGja2adSQA0iRqBPSP16wx-9QCHK7P0ADoFRAjKfo4elX5unVpg&s" alt="Profile image example"/>
        <div class="fb-profile-text">
        <h1>{{$user->name}}</h1>
            <p>Girls just wanna go fun.</p>
        </div>
    </div>
    <div>
        <a href="/profile"> Info</a>
        <a class="ml-3"  href="/profile/photos"> Photos</a>
        <a class="ml-3" href="/videos"> Videos</a>
         
       </div>
</div>
