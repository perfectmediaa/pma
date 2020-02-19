@extends('layouts.app')
<style>
    .card-pricing.popular {
    z-index: 1;
    border: 3px solid #007bff;
}
.card-pricing .list-unstyled li {
    padding: .5rem 0;
    color: #6c757d;
}
</style>
@section('content')
    
<div class="container mb-5 mt-5">
    <div class="d-flex justify-content-end my-3">
        <h4 class="text-right text-success mx-2">Wallet {{ $user->wallet->balance}} </h4>
    </div>
    @if ($message = Session::get('success'))
    
    <div class="alert alert-success alert-block my-3">
 
        <button type="button" class="close" data-dismiss="alert">×</button>
 
            <strong>{{ $message }}</strong>
 
    </div>
    <br>
    @endif
    <div class="pricing card-deck flex-column flex-md-row mb-3">
        <div class="card card-pricing popular shadow text-center px-3 mb-4 pt-3">
            <span class="h6 w-60 mx-auto px-4 py-1 rounded-bottom bg-primary text-white shadow-sm">Pricing</span>
            <div class="bg-transparent card-header pt-4 border-0">
                <h1 class="h1 font-weight-normal text-primary text-center mb-0" data-pricing-value="30">RS <span class="price">2000</span><span class="h6 text-muted ml-2">/ per Year</span></h1>
            </div>
            <div class="card-body pt-0">
                <ul class="list-unstyled mb-4">
                    <li>Up to 5 users</li>
                    <li>Basic support on Github</li>
                    <li>Monthly updates</li>
                    <li>Free cancelation</li>
                </ul>
            <form action="{{route('profile.upgrade.final')}}" method="POST">
                    @csrf
                    <input type="hidden" name="pak" value="1">
                    <button type="submit" class="btn btn-success mb-3">Pay Now</button>
                </form>
            </div>
        </div>
       
        <div class="card card-pricing text-center px-3 mb-4">
            <span class="h6 w-60 mx-auto px-4 py-1 rounded-bottom bg-primary text-white shadow-sm">Opportunity</span>
            <div class="card-body pt-0">
                <ul class="list-unstyled mb-4">
                    <li>Up to 5 users</li>
                    <li>Basic support on Github</li>
                    <li>Monthly updates</li>
                    <li>Free cancelation</li>
                </ul>
                <button type="button" class="btn btn-outline-secondary mb-3">Order now</button>
            </div>
        </div>
    </div>
</div>

@endsection

