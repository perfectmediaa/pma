@extends('layouts.admin')
@section('content')
<div class="container">
  @php
   $i =1;   
  @endphp
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">First</th>
            <th scope="col">Last</th>
            <th scope="col">Action</th>

          </tr>
        </thead>
        <tbody>
          @foreach ($users as $user)
          <tr>
          <th scope="row">{{$i++}}</th>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
          <td><a href="{{route('admin.profile', $user->id)}}"><button class="btn btn-danger">view</button></a></td>
          </tr>
          @endforeach
          
        </tbody>
      </table>
</div>
@endsection