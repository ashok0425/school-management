@extends('admin.admin.dashboard')
@section('admin-dashboard-body')
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            
           
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Create Gallery</h6>
                </div>
                <div class="card-body">
                    <form method="post" action="{{Request::segment(3)=='edit'?__setLink('admin/imagegallery/update',['gallery_id'=>$gallery->id]):__setLink('admin/imagegallery/save',['gallery_id'=>$gallery_id])}}" class="class" novalidate enctype="multipart/form-data">
                        {{csrf_field()}}
                     
                      
                        <div class="form-group">
                            <label for="level">Image</label>
                            <input type="file" name="thumbnail" id="image" onchange="loadPreview(this);" class="form-control">
                            <div class="invalid-feedback">
                                Please provide a Image.
                            </div>
                            @if(Request::segment(3)=='edit')
                            <input type="hidden" name="img" id="image" value="{{$gallery->images}}" class="form-control">

                                <img id="preview_img" src="{{asset('storage/'.$gallery->images)}}" class="pt-2" width="100" height="100" />
                            @else
                                <img id="preview_img" src="https://via.placeholder.com/150" class="pt-2" width="100" height="100"/>
                            @endif
                        </div>
                        
                        <button type="submit" id="submitButton" class="btn btn-primary btn-icon-split">
                            <span class="icon text-white-50">
                            <i class="fas fa-check"></i>
                            </span>
                            <span class="text">Save</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>

@endsection
@push('scripts')

   <script>
      
        (function() {
            'use strict';
       
            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('class');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
                });
            }, false);
        })();
    </script>
    <script>
        function loadPreview(input, id) {
            id = id || '#preview_img';
            if (input.files && input.files[0]) {
                var reader = new FileReader();
        
                reader.onload = function (e) {
                    $(id)
                            .attr('src', e.target.result)
                            .width(200)
                            .height(150);
                };
        
                reader.readAsDataURL(input.files[0]);
            }
        }
  </script>

  @if(isset($page))
@endif
