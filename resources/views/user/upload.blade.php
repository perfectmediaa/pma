@extends('layouts.app')

@section('content')

<div class="container">  
    @if ($message = Session::get('success'))
 
    <div class="alert alert-success alert-block">
 
        <button type="button" class="close" data-dismiss="alert">×</button>
 
            <strong>{{ $message }}</strong>
 
    </div>
    <br>
    @endif
<form id="file-upload-form" class="uploader" action="/update" method="post" accept-charset="utf-8" enctype="multipart/form-data">
@csrf
<input required type="file" class="form-control" name="images[]" placeholder="address" multiple>
<span class="text-danger">{{ $errors->first('images') }}</span>
<div id="thumb-output"></div>
<br>
<button type="submit" class="btn btn-success">Submit</button>
</form>
</div>
@endsection

