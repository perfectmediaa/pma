@extends('layouts.app')
<link href="{{ asset('css/all.css') }}" rel="stylesheet">
@section('content')
@include('user.head')
<div class="container mt-5">
    <h4>Personal Information</h4>
    <div class="row">
        <div class="col-md-12">
            <div class="main-timeline4">
                <div class="timeline">
                    <a href="#" class="timeline-content">
                        <span class="year">1</span>
                        <div class="inner-content">
                            <h3 class="title">Personallity</h3>
                            <p class="description">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras ex odio, rhoncus sit amet tincidunt eu, suscipit a orci. In suscipit quam eget dui auctor.
                            </p>
                        </div>
                    </a>
                </div>
                <div class="timeline">
                    <a href="#" class="timeline-content">
                        <span class="year">2</span>
                        <div class="inner-content">
                            <h3 class="title">Education</h3>
                            <p class="description">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras ex odio, rhoncus sit amet tincidunt eu, suscipit a orci. In suscipit quam eget dui auctor.
                            </p>
                        </div>
                    </a>
                </div>
                <div class="timeline">
                    <a href="#" class="timeline-content">
                        <span class="year">3</span>
                        <div class="inner-content">
                            <h3 class="title">Interests</h3>
                            <p class="description">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras ex odio, rhoncus sit amet tincidunt eu, suscipit a orci. In suscipit quam eget dui auctor.
                            </p>
                        </div>
                    </a>
                </div>
                <div class="timeline">
                    <a href="#" class="timeline-content">
                        <span class="year">3</span>
                        <div class="inner-content">
                            <h3 class="title">Experiences</h3>
                            <p class="description">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras ex odio, rhoncus sit amet tincidunt eu, suscipit a orci. In suscipit quam eget dui auctor.
                            </p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="row my-5 justify-content-end">
        <a href="/profile/update"> <button class="btn btn-primary"> Update Profile</button> </a>
    </div>
</div>
@endsection
