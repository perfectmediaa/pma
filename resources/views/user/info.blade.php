@extends('layouts.app')
<link href="{{ asset('css/all.css') }}" rel="stylesheet">
@section('content')
@include('user.head')
<div class="container mt-5 text-dark">
    <h4>Personal Information</h4>
    <div class="row">
        <div class="col-md-12">
            <div class="main-timeline4">
                <div class="timeline timeline-content">
                    <div  class="timeline-content">
                        <span class="year">1</span>
                        <div class="inner-content">
                            <h3 class="title">Personallity</h3>
                            <p class="description ">
                            <h5><b> Age:</b> {{$user->profile->age}}</h5>
                            <h5><b> Height:</b> {{$user->profile->height}}</h5>
                            <h5><b> Weight:</b> {{$user->profile->weight}}</h5>
                            <h5><b> Hair:</b> {{$user->profile->hair}}</h5>
                            <h5><b> Location:</b> {{$user->city}}</h5>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="timeline">
                    <div  class="timeline-content">
                        <span class="year">2</span>
                        <div class="inner-content">
                            <h3 class="title">Education</h3>
                            <p class="description">
                                <h5>Not set yet</h5>
                               
                            </p>
                        </div>
                    </div>
                </div>
                <div class="timeline">
                    <div class="timeline-content">
                        <span class="year">3</span>
                        <div class="inner-content">
                            <h3 class="title">Interests</h3>
                            <p class="description">
                                @empty($user->profile->interest)
                                <h5>No interest Set yet</h5>
                                @else
                                <h5> </h5>
                                    {{$user->profile->interest}}
                                @endempty
                               
                                
                            </p>
                        </div>
                    </div>
                </div>
                <div class="timeline">
                    <div class="timeline-content">
                        <span class="year">4</span>
                        <div class="inner-content">
                            <h3 class="title">Experiences</h3>
                            <p class="description">
                                @empty($user->profile->experience)
                                <h5>Experience has not set Yet.....</h5> 
                                @else
                                {{$user->profile->experience}}
                                @endempty
                                
                                
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row my-5 justify-content-end">
        <a href="/profile/update"> <button class="btn btn-primary"> Update Profile</button> </a>
    </div>
</div>
@endsection
