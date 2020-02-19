@extends('layouts.app')
<style>
    body {
    font-family: 'Roboto';font-size: 16px;
}

.aboutus-section {
    padding: 90px 0;
}
.aboutus-title {
    font-size: 30px;
    letter-spacing: 0;
    line-height: 32px;
    margin: 0 0 39px;
    padding: 0 0 11px;
    position: relative;
    text-transform: uppercase;
    color: #000;
}
.aboutus-title::after {
    background: #fdb801 none repeat scroll 0 0;
    bottom: 0;
    content: "";
    height: 2px;
    left: 0;
    position: absolute;
    width: 54px;
}
.aboutus-text {
    color: #606060;
    font-size: 13px;
    line-height: 22px;
    margin: 0 0 35px;
}

a:hover, a:active {
    color: #ffb901;
    text-decoration: none;
    outline: 0;
}
.aboutus-more {
    border: 1px solid #fdb801;
    border-radius: 25px;
    color: #fdb801;
    display: inline-block;
    font-size: 14px;
    font-weight: 700;
    letter-spacing: 0;
    padding: 7px 20px;
    text-transform: uppercase;
}
.feature .feature-box .iconset {
    background: #fff none repeat scroll 0 0;
    float: left;
    position: relative;
    width: 18%;
}
.feature .feature-box .iconset::after {
    background: #fdb801 none repeat scroll 0 0;
    content: "";
    height: 150%;
    left: 43%;
    position: absolute;
    top: 100%;
    width: 1px;
}

.feature .feature-box .feature-content h4 {
    color: #0f0f0f;
    font-size: 18px;
    letter-spacing: 0;
    line-height: 22px;
    margin: 0 0 5px;
}


.feature .feature-box .feature-content {
    float: left;
    padding-left: 28px;
    width: 78%;
}
.feature .feature-box .feature-content h4 {
    color: #0f0f0f;
    font-size: 18px;
    letter-spacing: 0;
    line-height: 22px;
    margin: 0 0 5px;
}
.feature .feature-box .feature-content p {
    color: #606060;
    font-size: 13px;
    line-height: 22px;
}
.icon {
    color : #f4b841;
    padding:0px;
    font-size:40px;
    border: 1px solid #fdb801;
    border-radius: 100px;
    color: #fdb801;
    font-size: 28px;
    height: 70px;
    line-height: 70px;
    text-align: center;
    width: 70px;
}
}
</style>

<!------ Include the above in your HEAD tag ---------->

@section('content')
<div class="aboutus-section">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="aboutus">
                        <h2 class="aboutus-title">About Us</h2>
                        <p class="aboutus-text">Perfect Media Academy, place where you can get verities of opportunities. Since 2018, we have been running this academy. Every individual aim to be part of media field and want to pursue their carrier in it. We are here to guide you and promote you as well. Here, you can get lots of learning and earning ideas. We provide you training classes related to this field such as Acting, classes, Direction, Personality Development classes and most importantly confident building classes. We too help you to come out with your hidden 
                            talents. Though each individual varies with the next, we give our best to make them the finest one.</p>
                        <p class="aboutus-text">Perfect Media Academy supports you to aim higher and allow you to grab every opportunity and make them true. Talking about modeling, we support freshers and professionals with the equal amounts of classes. Recently we are running kids modeling as well. Same as others, we also provide necessary amount of classes for kids prioritizing their needs and schedules. 
                            This would be the best platform for all. We have the best experienced teachers to help you and support you to be the one. So if you want to be the part of it, do join us and let your dreams come true.</p>
                        <a class="aboutus-more" href="#">Become Our Model</a>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="aboutus-banner">
                        <img src="http://themeinnovation.com/demo2/html/build-up/img/home1/about1.jpg" alt="">
                    </div>
                </div>
                <div class="col-md-5 col-sm-6 col-xs-12">
                    <div class="feature">
                        <div class="feature-box">
                            <div class="clearfix">
                                <div class="iconset">
                                    <span class="fa fa-setting icon"></span>
                                </div>
                                <div class="feature-content">
                                    <h4>Photoshoot</h4>
                                    <p>-Photo Shoot <br>
                                    -Video of PhotoShoot <br>
                                    -Portfolio Video(BIO) <br>
                                    -Make-up</p>
                                </div>
                            </div>
                        </div>
                        <div class="feature-box">
                            <div class="clearfix">
                                <div class="iconset">
                                    <span class="fa fa-setting icon"></span>
                                </div>
                                <div class="feature-content">
                                    <h4>InterView</h4>
                                    <p>-Self Intro video <br> 
                                    -Interview Video <br>
                                    - Game show with parents & kids  <br>
                                    -News
                                </p>
                                </div>
                            </div>
                        </div>
                        <div class="feature-box">
                            <div class="clearfix">
                                <div class="iconset">
                                    <span class="fa fa-setting icon"></span>
                                </div>
                                <div class="feature-content">
                                    <h4>Ramp Walk Training</h4>
                                    <p>- RampWalk Test <br>
                                    -descipline <br>
                                    -Dressing Sence <br>
                                    -Fashion Show
                                </p>
                                </div>
                            </div>
                        </div>
                        <div class="feature-box">
                            <div class="clearfix">
                                <div class="iconset">
                                    <span class="fa fa-setting icon"></span>
                                </div>
                                <div class="feature-content">
                                    <h4>Acting Course</h4>
                                    <p>- Acting Test <br>
                                    -Normal Acting Competition <br>
                                    -Acting classes <br>
                                    -Acting Training
                                </p>
                                </div>
                            </div>
                        </div>
                        <div class="feature-box">
                            <div class="clearfix">
                                <div class="iconset">
                                    <span class="fa fa-setting icon"></span>
                                </div>
                                <div class="feature-content">
                                    <h4>Dancing Class</h4>
                                    <p>- Dancing Test <br>
                                    -NOrmal Dancing Competition <br>
                                    -Dancing Training <br>
                                    -Dance Show
                                </p>
                                </div>
                            </div>
                        </div>
                        <div class="feature-box">
                            <div class="clearfix">
                                <div class="iconset">
                                    <span class="fa fa-setting icon"></span>
                                </div>
                                <div class="feature-content">
                                    <h4>Guaranteed Offer</h4>
                                    <p>- Post Ads <br>
                                    -Video Ads <br>
                                    -Web Ads <br>
                                </p>
                                </div>
                            </div>
                        </div>
                        <div class="feature-box">
                            <div class="clearfix">
                                <div class="iconset">
                                    <span class="fa fa-setting icon"></span>
                                </div>
                                <div class="feature-content">
                                    <h4>Reffer</h4>
                                    <p>- Nepali Movies <br>
                                    -Music Videos <br>
                                    -Web Series <br>
                                    -Tv ads
                                </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection