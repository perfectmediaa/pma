@extends('layouts.admin')
@section('content')
<div class="container">
  <div class="row my-5 justify-content-end">
    <form action="">
      <div class="form-row">
        <div class="col">
          <select name="type" class="form-control">
            <option value="1">Free Member</option>
            <option value="2">Form filled Members</option>
            <option value="3">Paid Members</option>
            <option value="4">Our Members</option>
          </select>
        </div>
        <div class="col">
          <select name="paid" class="form-control">
            <option value="1">Paid</option>
            <option value="0">Free</option>
          </select>
        </div>
        <div class="col">
          <input type="text" class="form-control" name="search" placeholder="Name or phone">
        </div>
        <div class="col">
          <button type="submit" class="btn btn-success btn-sm">Search</button>
        </div>
      </div>
    </form>
  </div>
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