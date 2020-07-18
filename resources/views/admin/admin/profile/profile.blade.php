@extends('admin.admin.dashboard')
@section('admin-dashboard-body')
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            @include('admin.layout.validation-error')
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Edit Profile</h6>
                   
                </div>
                <div class="card-body">
                    <form method="post" action="{{route('admin.edit.profile')}}" class="change-password" novalidate enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="level">Name</label>
                            <input type="text" class="form-control" id="name" name="name"  required="true" value="{{Auth::guard('superadmin')->user()->name}}">
                            <div class="invalid-feedback">
                                Please provide a Name.
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="level">Email</label>
                            <input type="email" class="form-control" id="email" name="email"  required="true" value="{{Auth::guard('superadmin')->user()->email}}">
                            <div class="invalid-feedback">
                                Please provide a Name.
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="level">Image</label>
                            <input type="file" name="image" id="image" onchange="loadPreview(this);" class="form-control">
                            <div class="invalid-feedback">
                                Please provide a Image.
                            </div>
                            @if(isset(Auth::guard('superadmin')->user()->image))
                             <img id="preview_img" src="{{Auth::guard('superadmin')->user()->image}}" class="" width="200" height="150"/>
                            @else
                             <img id="preview_img" src="https://via.placeholder.com/150" class="" width="200" height="150"/>
                            @endif
                        </div>

                        <button type="submit" id="submitButton" class="btn btn-warning btn-icon-split">
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
                var forms = document.getElementsByClassName('change-password');
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
@endpush
