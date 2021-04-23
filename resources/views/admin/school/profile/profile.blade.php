@extends('admin.school.dashboard')
@section('dashboard-body')
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            @include('admin.layout.validation-error')
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">School Information</h6>
                   
                </div>
                <div class="card-body">
                    <form method="post" action="{{route('school.edit.profile')}}" class="change-password" novalidate enctype="multipart/form-data" >
                        {{csrf_field()}}
                       <!--  <div class="form-group">
                            <label for="level">Claim Your Public URL</label>
                            <input type="text" class="form-control" id="public_url" name="public_url" placeholder="Enter Your Public URL" required="true" value="">
                            <div class="invalid-feedback">
                                Please provide your public URL.
                            </div>
                        </div> -->
                        <div class="form-group">
                            <label for="level">School Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Eneter School Name" required="true" value="{{$school->name}}">
                            <div class="invalid-feedback">
                                Please provide a School Name.
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="level"> Address</label>
                            <input type="text" class="form-control" id="address" name="address" placeholder="Eneter School Address" required="true" value="{{$school->address}}">
                            <div class="invalid-feedback">
                                Please provide a School Address.
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="level"> Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="school@email.com" required="true" value="{{$school->email}}">
                            <div class="invalid-feedback">
                                Please provide a School Email Address.
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="level">PAN No</label>
                            <input type="text" class="form-control" id="panno" name="panno" placeholder="Eneter School Pan No" required="true" value="{{$school->panno}}">
                            <div class="invalid-feedback">
                                Please provide a School Pan No.
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="level">Contact</label>
                            <input type="text" class="form-control" id="contact" name="contact" placeholder="Eneter School Contact Number" required="true" value="{{$school->contact}}">
                            <div class="invalid-feedback">
                                Please provide a School Name.
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="level">School Motto</label>
                            <textarea class="form-control" id="school_motto"  name="school_motto" rows="3">{{$school->school_motto}}</textarea>
                            <div class="invalid-feedback">
                                Please provide a School Motto.
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="level">School Logo</label>
                            <input type="file" name="logo" id="logo" onchange="loadPreview(this);" class="form-control">
                            <div class="invalid-feedback">
                                Please provide a School Logo.
                            </div>
                            @if($school->logo)
                                <img id="preview_img" src="{{ asset('/storage') . '/' . Auth::guard('school')->user()->logo }}" class="" width="100" height="100"/>
                            @else
                                <img id="preview_img" src="https://via.placeholder.com/150" class="" width="100" height="100"/>
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
