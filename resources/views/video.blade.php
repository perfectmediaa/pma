@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row my-auto">
    <div class="col-lg">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">{{$video->name}}</h5>
          <div class=" embed-responsive embed-responsive-16by9">
            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{{$video->video}}?rel=0" allowfullscreen></iframe>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection