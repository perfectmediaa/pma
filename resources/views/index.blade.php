@extends('layouts.app')
@section('title', 'Perfect Media Academy')
<link href="{{ asset('css/home.css') }}" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="{{ asset('js/home.js') }}" defer></script>
<style>
    .model-are{
        background-color: #052a6a;
    }
    .form-control-borderless {
    border: none;
}

.form-control-borderless:hover, .form-control-borderless:active, .form-control-borderless:focus {
    border: none;
    outline: none;
    box-shadow: none;
}
.jumbotron{margin-bottom: 0;}


/* Paragraph for Parallax Section */ 
.mainn p {
font-size: 24px;
color:#f5f5f5;
text-align: center;
line-height: 60px;
}
 
/* Heading for Parallax Section */ 
.mainn h1 {
color: rgba(255, 255, 255, 0.8);
color: rgb(255, 255, 255);
font-size: 35px;
text-align: center;
padding-top: 60px;
line-height: 50px;
}


.mainn {
    width: 100%;
    height: 400px;
background-image: url("https://i.ytimg.com/vi/VyiKSfMaAW8/maxresdefault.jpg");

}
  
</style>
@section('content')
     <div class="container-fluid px-0">
        <div class="justify-content-center ">
            <div class=" mainn justify-content-center">
                <h1 class="display-3">Perfect Media Academy</h1>
                <p class="lead">"Models and actors are not born, they are made"</p>
                <p class="lead">
                <a class="btn btn-success btn-lg btn-md mb-3" href="{{route('modalform')}}" role="button">Become Our Model</a>
                </p>
            </div>
          <div class="d-flex justify-content-center ">
            <div class="col-12 col-md-10 col-lg-8">
                <form id="search_form" class="card card-sm" action="/models" method="GET">
                        <div class="card-body row no-gutters align-items-center">
                            <div class="col-auto">
                                <i class="fa fa-search h4 text-body"></i>
                            </div>
                            <!--end of col-->
                            <div class="col">
                                <input class="form-control form-control-lg form-control-borderless" name="search" type="search" placeholder="Search Models or location">
                            </div>
                            <!--end of col-->
                            <div class="col-auto">
                                <button class="btn btn-lg btn-success" id="submit_form" type="submit">Search</button>
                            </div>
                            <!--end of col-->
                        </div>
                    </form>
                </div>
          </div>
            
           
</div>
            
</div>
<div class="container text-center py-0">
    <div class="justify-content-center border border-primary">
        <div class="model-are">
            <h3 class=" text-white py-3">Perfect Media Academy</h3>
        </div>
        
        <div class="col text-dark">
            <p style ="text-align: justify;
            ">Perfect Media Academy, place where you can get verities of opportunities. Since 2018, we have been running this academy. Every individual aim to be part of media field and want to pursue their carrier in it. We are here to guide you and promote you as well. Here, you can get lots of learning and earning ideas. We provide you training classes related to this field such as Acting, classes, Direction, Personality Development classes and most importantly confident building classes. We too help you to come out with your hidden talents.
            <br>
        <a href="{{route('about.page')}}">
                <button class="btn btn-success btn-sm">Read More</button>
            </a>
            </p>
        </div>
    </div>
    
        <div class="row">
            <div class="MultiCarousel" data-items="1,2,3,4" data-slide="1" id="MultiCarousel"  data-interval="1000">
                <div class="MultiCarousel-inner">
    
                    @foreach ($albums as $album)
                    <div class="item">
                        <div class="pad15">
                        <a href="
                        {{route('photos',$album->id)}}"> <img class="img-thumbnail w-100" src="/albums/{{$album->cover_image }}" alt="image" style="width:100%; height:300px"/></a> 
                        </div>
                    </div>
                    @endforeach
    
                </div>
                <button class="btn btn-primary leftLst"><</button>
                <button class="btn btn-primary rightLst">></button>
            </div>
       </div> 
    
       <h3 class="text-white model-are py-2"> Latest Videos</h3>
       <div class="row">
            <div class="MultiCarousel" data-items="1,2,3,4" data-slide="1" id="MultiCarousel"  data-interval="1000">
                <div class="MultiCarousel-inner">

                    @foreach ($videos as $video)
                    <div class="item">
                        
                        <div class="pad15">
    
                         
                        <a  href="{{route('get.video',$video->id)}}">
                                <img src="https://img.youtube.com/vi/{{$video->video}}/0.jpg" alt="videos" style="width:100%; height:250px">
                              
                            </a>
                        </div>
                    
                    </div>
                    @endforeach

                </div>
                <button class="btn btn-primary leftLst"><</button>
                <button class="btn btn-primary rightLst">></button>
            </div>
       </div>

<!-- News Section -->
<h3 class="text-white model-are py-2"> Recent News</h3>
<div class="row">
    @foreach ($news as $item)
    <div class="col-sm-4">
        <div class="card">
          <div class="card-body">
            <a href="{{route('single.news',$item->slug)}}"> <h5 class="card-title text-primary">{{$item->title}}</h5> </a>
          <p class="card-text text-dark">{!! substr($item->description,0,109) !!}....</p>
          <a href="{{route('single.news',$item->slug)}}"> <button type="button" class="btn btn-outline-danger btn-sm float-right">Read More</button> </a>
          </div>
        </div>
      </div>
    @endforeach
  </div>

<!-- Team -->
<h3 class="text-white model-are py-2 my-3"> Our Team</h3>
<section id="team" class="pb-5">
    <div class="container">
        <div class="row">
            <!-- Team member -->
            <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
                    <div class="mainflip">
                        <div class="frontside">
                            <div class="card">
                                <div class="card-body text-center text-dark">
                                    <p><img class=" img-fluid" src="/assets/rajan.jpg" alt="rajan"></p>
                                    <h4 class="card-title">Rajan Karki</h4>
                                    <h5 class="card-text"> <b> C.E.O </b></h5>
                                    <p class="card-text py-3">Business Man, Actor & Social Worker</p>
                                    <a href="#" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="backside">
                            <div class="card">
                                <div class="card-body text-center mt-1">
                                    <h4 class="card-title">Rajan Karki</h4>
                                    <p class="card-text" style="font-size:11px; text-align: justify"> Most energetic person of Perfect Media Academy. In 2014 he has done three movies he also got major role in ads like RedBull and Iceberg. He has played more than ten music videos. He became major judge in event like Miss Gandaki Season 1 and Kaski Idol. In 2016 he was featured in a popular movie called “Chhesko” as a lead Actor and Producer as well. In 2017 he organized an event called “Kantipur Idol” as producer. Finally, in 2018 he became C.E.O of the Perfect Media Academy and DYT Tv. 
                                        He has been working hard to make the Perfect Media Academy one of the top modeling academy in Nepal.</p>
                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                            <a class="social-icon text-xs-center" target="_blank" href="#">
                                                <i class="fa fa-facebook"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a class="social-icon text-xs-center" target="_blank" href="#">
                                                <i class="fa fa-twitter"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a class="social-icon text-xs-center" target="_blank" href="#">
                                                <i class="fa fa-skype"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a class="social-icon text-xs-center" target="_blank" href="#">
                                                <i class="fa fa-google"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ./Team member -->
            <!-- Team member -->
            <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
                    <div class="mainflip">
                        <div class="frontside">
                            <div class="card">
                                <div class="card-body text-center">
                                    <p><img class=" img-fluid" src="https://sunlimetech.com/portfolio/boot4menu/assets/imgs/team/img_02.png" alt="card image"></p>
                                    <h4 class="card-title">English</h4>
                                    <h5 class="card-text"> <b> Managing Director </b></h5>
                                    <p class="card-text py-3">Business Man, Actor & Social Worker</p>
                                    <a href="#" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="backside">
                            <div class="card">
                                <div class="card-body text-center mt-4">
                                    <h4 class="card-title">Sunlimetech</h4>
                                    <p class="card-text">This is basic card with image on top, title, description and button.This is basic card with image on top, title, description and button.This is basic card with image on top, title, description and button.</p>
                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                            <a class="social-icon text-xs-center" target="_blank" href="#">
                                                <i class="fa fa-facebook"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a class="social-icon text-xs-center" target="_blank" href="#">
                                                <i class="fa fa-twitter"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a class="social-icon text-xs-center" target="_blank" href="#">
                                                <i class="fa fa-skype"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a class="social-icon text-xs-center" target="_blank" href="#">
                                                <i class="fa fa-google"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ./Team member -->
            <!-- Team member -->
            <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
                    <div class="mainflip">
                        <div class="frontside">
                            <div class="card">
                                <div class="card-body text-center">
                                    <p><img class=" img-fluid" src="https://sunlimetech.com/portfolio/boot4menu/assets/imgs/team/img_03.png" alt="card image"></p>
                                    <h4 class="card-title">Santosh Sharma</h4>
                                    <h5 class="card-text text-dark"> <b> M.D </b></h5>
                                    <p class="card-text py-3">Business Man & Social Worker</p>
                                    <a href="#" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="backside">
                            <div class="card">
                                <div class="card-body text-center mt-4">
                                    <h4 class="card-title">Santosh Sharma</h4>
                                    <p class="card-text" style="text-align: justify; font-size:12px;">The most Hardworking person of the Perfect Media Academy. He has been 
                                        working in the media field since 2014. He had organized the several events one of the popular among them was Kantipur Idol. He has been working as managing Director in Perfect Media Academy Since 2018. He has a role of direct and control the all business operations. He is responsible for giving strategic guidance and direction to the board to ensure that the Company achieves its financial vision, mission and long term goals. </p>
                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                            <a class="social-icon text-xs-center" target="_blank" href="#">
                                                <i class="fa fa-facebook"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a class="social-icon text-xs-center" target="_blank" href="#">
                                                <i class="fa fa-twitter"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a class="social-icon text-xs-center" target="_blank" href="#">
                                                <i class="fa fa-skype"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a class="social-icon text-xs-center" target="_blank" href="#">
                                                <i class="fa fa-google"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ./Team member -->
            <!-- Team member -->
            <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
                    <div class="mainflip">
                        <div class="frontside">
                            <div class="card">
                                <div class="card-body text-center">
                                    <p><img class=" img-fluid" src="https://sunlimetech.com/portfolio/boot4menu/assets/imgs/team/img_04.jpg" alt="card image"></p>
                                    <h4 class="card-title">Ameer Tamang</h4>
                                    <h5 class="card-text text-dark"> <b> Management </b></h5>
                                    <p class="card-text py-3">Leader & Social Worker</p>
                                    <a href="#" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="backside">
                            <div class="card">
                                <div class="card-body text-center mt-4">
                                    <h4 class="card-title">Ameer Tamang</h4>
                                    <p class="card-text" style="text-align: justify; font-size:12px;"> He is in media field since 2016. He has acted as junior artist in several Nepali movies. He had handled all the management part of the event called Kantipur Idol which was organized in 2017. He has very good team handling capacity. He is responsible for planning, directing and overseeing the operations of a business unit, division, department, or an operating unit within an organization. In Perfect Media Academy he is responsible for 
                                        overseeing and leading the work of a group of people in many instances. </p>
                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                            <a class="social-icon text-xs-center" target="_blank" href="#">
                                                <i class="fa fa-facebook"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a class="social-icon text-xs-center" target="_blank" href="#">
                                                <i class="fa fa-twitter"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a class="social-icon text-xs-center" target="_blank" href="#">
                                                <i class="fa fa-skype"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a class="social-icon text-xs-center" target="_blank" href="#">
                                                <i class="fa fa-google"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ./Team member -->
            <!-- Team member -->
            <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
                    <div class="mainflip">
                        <div class="frontside">
                            <div class="card">
                                <div class="card-body text-center">
                                    <p><img class=" img-fluid" src="https://sunlimetech.com/portfolio/boot4menu/assets/imgs/team/img_05.png" alt="card image"></p>
                                    <h4 class="card-title">Bhawana Rai</h4>
                                    <h5 class="card-text text-dark"> <b> V.J </b></h5>
                                    <p class="card-text py-3">Video Section</p>
                                    <a href="#" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="backside">
                            <div class="card">
                                <div class="card-body text-center mt-4">
                                    <h4 class="card-title">Bhawana Rai</h4>
                                    <p class="card-text">nd buttoncard with image on top, title, description and button.</p>
                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                            <a class="social-icon text-xs-center" target="_blank" href="#">
                                                <i class="fa fa-facebook"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a class="social-icon text-xs-center" target="_blank" href="#">
                                                <i class="fa fa-twitter"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a class="social-icon text-xs-center" target="_blank" href="#">
                                                <i class="fa fa-skype"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a class="social-icon text-xs-center" target="_blank" href="#">
                                                <i class="fa fa-google"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ./Team member -->
            <!-- Team member -->
            <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
                    <div class="mainflip">
                        <div class="frontside">
                            <div class="card">
                                <div class="card-body text-center">
                                    <p><img class=" img-fluid" src="https://sunlimetech.com/portfolio/boot4menu/assets/imgs/team/img_06.jpg" alt="card image"></p>
                                    <h4 class="card-title">Snaker Karki</h4>
                                    <h5 class="card-text text-dark"> <b> instructor </b></h5>
                                    <p class="card-text py-3">Nepali Movie Director</p>
                                    <a href="#" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="backside">
                            <div class="card">
                                <div class="card-body text-center mt-4">
                                    <h4 class="card-title">Sankar Karki</h4>
                                    <p class="card-text">This is basic card with image on top, title, description and button.This is basic card with image on top, title, description and button.This is basic card with image on top, title, description and button.</p>
                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                            <a class="social-icon text-xs-center" target="_blank" href="#">
                                                <i class="fa fa-facebook"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a class="social-icon text-xs-center" target="_blank" href="#">
                                                <i class="fa fa-twitter"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a class="social-icon text-xs-center" target="_blank" href="#">
                                                <i class="fa fa-skype"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a class="social-icon text-xs-center" target="_blank" href="#">
                                                <i class="fa fa-google"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ./Team member -->

        </div>
    </div>
</section>
<!-- Team -->
    

</div>
@endsection