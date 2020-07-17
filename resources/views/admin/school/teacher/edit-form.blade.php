@extends('admin.school.dashboard')
@section('dashboard-body')
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
           
            @include('admin.layout.validation-error')
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Edit Teacher :{{$user->name}}</h6>
                </div>

                <div class="card-body">
                    <form method="post" action="{{route('school.teacher.update',['user'=>$user->id])}}" class="create-teacher" novalidate oninput='password_confirmation.setCustomValidity(password_confirmation.value != password.value ? "Password did not matched." : "")' enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="name">Full Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Teacher Name" required="true" value="{{$user->name}}">
                            <div class="invalid-feedback">
                                Please provide a teacher name.
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="contact">Contact</label>
                            <input type="contact" class="form-control" id="contact" name="contact" placeholder="98******" required="true" value="{{$user->contactno}}">
                            <div class="invalid-feedback">
                                Please provide a valid phone number.
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="youremail@mail.com" required="true"  value="{{$user->email}}">
                            <div class="invalid-feedback">
                                Please provide a valid email address.
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="*****" >
                            <div class="invalid-feedback">
                                Please provide a password.
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="confirm-password">Confirm Password</label>
                            <input type="password" class="form-control cPassword" id="confirm-password" name="password_confirmation" placeholder="*****" >
                            <div class="invalid-feedback" id="invalidPassword">
                                Password does not match.
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email">Image</label>
                            <input type="file" name="image" class="file file-img-preview" accept="image/*">
                            <div class="input-group my-3">
                                <input type="text" class="form-control" disabled placeholder="Upload File" id="file">
                                <div class="input-group-append">
                                    <button type="button" class="browse btn btn-primary">Browse...</button>
                                </div>
                                
                            </div>
                            <div class="ml-2 col-sm-6">
                                    @if(isset($user->image))
                                        <img src="{{$user->image}}" id="preview" class="img-thumbnail" style="width:80px;height:80px;">

                                    @else
                                        <img src="{{asset('admin/img/user.png')}}" id="preview" class="img-thumbnail" style="width:80px;height:80px;">
                                    @endif
                            </div>
                            
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
                var forms = document.getElementsByClassName('create-teacher');
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

        $(document).on("click", ".browse", function() {
            var file = $(this).parents().find(".file");
            file.trigger("click");
            });
            $('input[type="file"]').change(function(e) {
            var fileName = e.target.files[0].name;
            $("#file").val(fileName);

            var reader = new FileReader();
            reader.onload = function(e) {
                // get loaded data and render thumbnail.
                document.getElementById("preview").src = e.target.result;
            };
            // read the image file as a data URL.
            reader.readAsDataURL(this.files[0]);
        });

        $('#password, #confirm-password').on('keyup', function () {
                if ($('#password').val() != '' && $('#confirm-password').val() != '' && $('#password').val() == $('#confirm-password').val()) {
                    $('.cPassword').removeClass('is-invalid')
                } else {
                    $('.cPassword').addClass('is-invalid')
                }
        });
    </script>
@endpush