@extends('layouts.app')
<style>

.section-block-grey {
    padding: 90px 0px 90px 0px;
    background-color: #f9f9f9;
}

.serv-section-2 {
    position: relative;
    border: 1px solid #eee;
    background: #fff;
    box-shadow: 0px 10px 30px 0px rgba(50, 50, 50, 0.16);
    border-radius: 5px;
    overflow: hidden;
    padding: 30px;
}

.serv-section-2:before {
    position: absolute;
    top: 0;
    right: 0px;
    z-index: 0;
    content: " ";
    width: 120px;
    height: 120px;
    background: #f5f5f5;
    border-bottom-left-radius: 136px;
    transition: all 0.4s ease-in-out;
    -webkit-transition: all 0.4s ease-in-out;
}

.serv-section-2-icon {
    position: absolute;
    top: 18px;
    right: 22px;
    max-width: 100px;
    z-index: 1;
    text-align: center;
}

.serv-section-2-icon i {
    color: #5f27cd;
    font-size: 48px;
    line-height: 65px;
    transition: all 0.4s ease-in-out;
    -webkit-transition: all 0.4s ease-in-out;
}

.serv-section-desc {
    position: relative;
}

.serv-section-2 h4 {
    color: #333;
    font-size: 20px;
    font-weight: 500;
    line-height: 1.5;
}

.serv-section-2 h5 {
    color: #333;
    font-size: 17px;
    font-weight: 400;
    line-height: 1;
    margin-top: 5px;
}

.section-heading-line-left {
    content: '';
    display: block;
    width: 100px;
    height: 3px;
    background: #5f27cd;
    border-radius: 25%;
    margin-top: 15px;
    margin-bottom: 5px;
}

.serv-section-2 p {
    margin-top: 25px;
    padding-right: 50px;
}

.serv-section-2:hover .serv-section-2-icon i {
    color: #fff;
}

.serv-section-2:hover:before {
    background: #5f27cd;
}
</style>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
@section('content')
@include('user.head')
<div class="container text-dark"> 
<div class="section-block-grey">
    
        <div class="section-heading center-holder">
            <h3>Become our Model</h3>
            <div class="section-heading-line"></div>
            <p>Modeling as a career has become a much-vaunted choice now with thousands of aspirants chasing the dream of becoming the next supermodel. Those days are over when you could depend on your luck to get spotted, the chances of that happening are one-in-a-million now. To become a model, it takes discipline, effort, and perseverance. You need to plan, prepare, and follow a strategy to stand out and get noticed. We have spoken to several successful models and agencies and put together a list of tips below that you must follow to break 
                into the modeling industry and kickstart your modeling career. So here's how to get started in modeling:</p>
        </div>
        <div class="row mt-60">
            <div class="col-md-4 col-sm-12 col-12">
                <div class="serv-section-2">
                    <div class="serv-section-2-icon"> <i class="fas fa-gem"></i> </div>
                    <div class="serv-section-desc">
                        <h4>PhotoShoot</h4>
                        <h5>Indoor and Outdoor</h5> </div>
                    <div class="section-heading-line-left"></div>
                </div>
            </div>
            <div class="col-md-4 col-sm-12 col-12">
                <div class="serv-section-2 serv-section-2-act">
                    <div class="serv-section-2-icon serv-section-2-icon-act"> <i class="fas fa-cogs"></i> </div>
                    <div class="serv-section-desc">
                        <h4>Interview</h4>
                        <h5>Self, Game Show</h5> </div>
                    <div class="section-heading-line-left"></div>
                   
                </div>
            </div>
            <div class="col-md-4 col-sm-12 col-12">
                <div class="serv-section-2">
                    <div class="serv-section-2-icon"> <i class="fas fa-signature"></i> </div>
                    <div class="serv-section-desc">
                        <h4>RampWalk Training</h4>
                        <h5>Test, Fashion Show</h5> </div>
                    <div class="section-heading-line-left"></div>
                    
                </div>
            </div>
        </div>
		<div class="row mt-60">
            <div class="col-md-4 col-sm-12 col-12">
                <div class="serv-section-2">
                    <div class="serv-section-2-icon"> <i class="fas fa-shield-alt"></i> </div>
                    <div class="serv-section-desc">
                        <h4>Acting</h4>
                        <h5>Class,Test,Competitions</h5> </div>
                    <div class="section-heading-line-left"></div>
                    
                </div>
            </div>
            <div class="col-md-4 col-sm-12 col-12">
                <div class="serv-section-2 serv-section-2-act">
                    <div class="serv-section-2-icon serv-section-2-icon-act"> <i class="far fa-clock"></i> </div>
                    <div class="serv-section-desc">
                        <h4>Dancing </h4>
                        <h5>Test, Class, Training </h5> </div>
                    <div class="section-heading-line-left"></div>
                   
                </div>
            </div>
            <div class="col-md-4 col-sm-12 col-12">
                <div class="serv-section-2">
                    <div class="serv-section-2-icon"> <i class="fas fa-signature"></i> </div>
                    <div class="serv-section-desc">
                        <h4> Guaranteed Offer </h4>
                        <h5>Poster & Video Ads</h5> </div>
                    <div class="section-heading-line-left"></div>
                    
                </div>
            </div>
        </div>
        <div class="row mx-0 my-3">
            <div class="card">
                <div class="card-header text-center">
                  <h4>Your Membership</h4>
                </div>
                <div class="card-body text-start">
                  <h5 class="card-title">You are currently a <b> Basic Member </b></h5>
                  <p class="card-text">You can send your info filling up model registration from.</p>
                <a href="{{route('modalform')}}" class="btn btn-primary float-right">Open Form</a>
                </div>
            </div>
            <div class="card">
                <div class="card-header text-center">
                  <h4>How to add fund</h4>
                </div>
                <div class="card-body text-start">
                  <h5 class="card-title">You are currently a <b> Basic Member </b></h5>
                  <p class="card-text">you can fund your wallet using various payment methods.</p>
                  <a href="{{route('get.wallet')}}" class="btn btn-primary float-right">Add fund</a>
                </div>
            </div>
        </div>
        
    </div>
</div>

@endsection