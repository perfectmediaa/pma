@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="col d-flex text-right my-3">
        <h5 class="text-center"> Total Forms {{$total}}</h5>
    </div>
  @php
   $i =1;   
  @endphp
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Address</th>
            <th scope="col">Date</th>
            <th scope="col">Action</th>

          </tr>
        </thead>
        <tbody>
          @foreach ($forms as $form)
          <tr>
          <th scope="row">{{$i++}}</th>
            <td>{{$form->name}}</td>
            <td>{{$form->address}}</td>
            <td>{{$form->created_at->format('d/m/Y')}}</td>
          <td><a href="{{route('admin.profile', $form->user->id)}}"><button class="btn btn-danger">view</button></a></td>
          </tr>
          @endforeach
          
        </tbody>
      </table>
      <div class="d-flex row mb-2 justify-content-end">
        {!! $forms->render() !!}
    </div>
</div>
@endsection