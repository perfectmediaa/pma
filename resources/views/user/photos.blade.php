@extends('layouts.app')
<style>
.btn:focus, .btn:active, button:focus, button:active {
  outline: none !important;
  box-shadow: none !important;
}

#image-gallery .modal-footer{
  display: block;
}

.thumb{
  margin-top: 15px;
  margin-bottom: 15px;

}
</style>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
@section('content')


<div class="container">
    @include('user.head')
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
    <div class="row d-flex justify-content-end">
        <button type="button" class="btn btn-danger mx-2 btn-sm" data-toggle="modal" data-target="#album">
            Profile Image
          </button>
          <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#photos">
            New Images
          </button>
            
          <div class="modal fade text-dark" id="album" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalCenterTitle">upload Profile Image</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    <form id="imageUploadForm" action="{{route('store.album')}}" enctype="multipart/form-data" method="POST">
  
                        @csrf
                      
                          <div class="form-group">
                      
                            <label>Album Title:</label>
                      
                            <input type="text" name="title" class="form-control" value="{{$user->album->name}}" required>
                      
                          </div>
                      
                      
                          <div class="form-group">
                      
                            <label>Image:</label>
                      
                            <input type="file" name="image" id="image" class="form-control" required>
                      
                          </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button class="btn btn-success upload-image" type="submit"> Upload Image</button>
                </form>
                </div>
              </div>
            </div>
          </div>

          <div class="modal fade text-dark" id="photos" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalCenterTitle">Upload images</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    <form id="imageUploadForm" action="{{route('store.photos')}}" enctype="multipart/form-data" method="POST">

                        @csrf
                      
                          <div class="form-group">
                      
                            <label>Upload multiple Images:</label>
                      
                            <input required type="file" class="form-control" name="images[]" placeholder="images" multiple>
                      
                          </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button class="btn btn-success upload-image" type="submit"> Upload Image</button>
                </form>
                </div>
              </div>
            </div>
          </div>
            
        </div>

	<div class="row">
		<div class="row">
            @forelse ($images as $image)
            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-title=""
                   data-image="/images/{{$image->image}}"
                   data-target="#image-gallery">
                    <img class="img-thumbnail"
                         src="/images/{{$image->image}}"
                         alt="Another alt text">
                </a>
              <a href="{{route('profile.photos.delete',$image->id)}}"><button type="button" id="delete" class="btn btn-outline-danger btn-sm mx-1">Delete
                </button></a>
                
            </div>
            @empty
            <div class=" alert alert-warning my-5 mx-3 px-3">
              <h5><strong class="text-center">Sorry!</strong> No Images in this album.</h5> 
           </div>
            @endforelse
            
        </div>


        <div class="modal fade" id="image-gallery" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="image-gallery-title"></h4>
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <img id="image-gallery-image" class="img-responsive col-md-12" src="">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary float-left" id="show-previous-image"><i class="fa fa-arrow-left"></i>
                        </button>
                        
                        <button type="button" id="show-next-image" class="btn btn-secondary float-right"><i class="fa fa-arrow-right"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
	</div>
</div>
    
@endsection
<script>
let modalId = $('#image-gallery');

$(document)
  .ready(function () {

    loadGallery(true, 'a.thumbnail');

    //This function disables buttons when needed
    function disableButtons(counter_max, counter_current) {
      $('#show-previous-image, #show-next-image')
        .show();
      if (counter_max === counter_current) {
        $('#show-next-image')
          .hide();
      } else if (counter_current === 1) {
        $('#show-previous-image')
          .hide();
      }
    }

    function loadGallery(setIDs, setClickAttr) {
      let current_image,
        selector,
        counter = 0;

      $('#show-next-image, #show-previous-image')
        .click(function () {
          if ($(this)
            .attr('id') === 'show-previous-image') {
            current_image--;
          } else {
            current_image++;
          }

          selector = $('[data-image-id="' + current_image + '"]');
          updateGallery(selector);
        });

      function updateGallery(selector) {
        let $sel = selector;
        current_image = $sel.data('image-id');
        $('#image-gallery-title')
          .text($sel.data('title'));
        $('#image-gallery-image')
          .attr('src', $sel.data('image'));
        disableButtons(counter, $sel.data('image-id'));
      }

      if (setIDs == true) {
        $('[data-image-id]')
          .each(function () {
            counter++;
            $(this)
              .attr('data-image-id', counter);
          });
      }
      $(setClickAttr)
        .on('click', function () {
          updateGallery($(this));
        });
    }
  });

// build key actions
$(document)
  .keydown(function (e) {
    switch (e.which) {
      case 37: // left
        if ((modalId.data('bs.modal') || {})._isShown && $('#show-previous-image').is(":visible")) {
          $('#show-previous-image')
            .click();
        }
        break;

      case 39: // right
        if ((modalId.data('bs.modal') || {})._isShown && $('#show-next-image').is(":visible")) {
          $('#show-next-image')
            .click();
        }
        break;

      default:
        return; // exit this handler for other keys
    }
    e.preventDefault(); // prevent the default action (scroll / move caret)
  });

</script>