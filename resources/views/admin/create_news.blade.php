@extends('layouts.admin')
<script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.15/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.15/dist/summernote-bs4.min.js"></script>

@section('content')
<div class="container">
    <div class="d-flex col-sm-9 justify-content-center">
        <h4>Create New News</h4>
    </div>
    @if ($message = Session::get('success'))
    
    <div class="alert alert-success alert-block">
 
        <button type="button" class="close" data-dismiss="alert">×</button>
 
            <strong>{{ $message }}</strong>
 
    </div>
    <br>
    @endif
    @if (count($errors) > 0)

    <div class="alert alert-danger alert-block">
        <button type="button" class="close" data-dismiss="alert">X</button>
    
            @foreach ($errors->all() as $error)

                <p>{{ $error }}</p>

            @endforeach

    </div>
   @endif
    <div class="col-12 my-3">
    <form action="{{route('admin.news.store')}}" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="form-group">
                <label for="" class="col-sm-3 control-label">News Title</label>
                <div class="col-sm-9">
                    <input type="text" name="title" class="form-control" required>
                </div>
            </div>
            
            <div class="form-group">
                <label for="" class="col-sm-3 control-label">Description</label>
                <div class="col-sm-9">
                    <textarea name="description" id="description" cols="30" rows="10" class="summernote" required></textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="" class="col-sm-3 control-label">Tags</label>
                <div class="col-sm-9">
                    <input type="text" name="tags" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label for="" class="col-sm-3 control-label">Image</label>
                <div class="col-sm-9">
                    <input type="file" name="image" id="image" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <div class="d-flex col-sm-9 justify-content-end">
                 <button class="btn btn-success" type="submit">Submit</button>
                </div>
              </div>
              
        </form>
        
    </div>
</div>
<script>
    $('.summernote').summernote({
      placeholder: 'write news here',
      tabsize: 2,
      height: 100
    });
  </script>
@endsection











    

