@extends('website.layouts.main')
<style>
    .icon-img{
        position: absolute;
        top: -57px;
        left: 32%;
        width: 25%;
        margin: 20px;
    }
</style>
@section('page')
    <div class="login-wrapper">
        <div class="container">
            <!-- Outer Row -->
            <div class="row justify-content-center">
                <div class="col-xl-5 col-lg-5 col-md-5">
                    <div class="card o-hidden border-0 shadow-lg my-5 m-t-50">

                        <div class="card-body p-0">

                            <!-- Nested Row within Card Body -->
                            <div class="row">

                                <!-- <div class="col-lg-6 d-none d-lg-block bg-login-image"></div> -->
                                <div class="col-lg-12 ">
                                    <div class="p-5">
                                        <div class="text-center">
                                            <img class="icon-img" src="{{asset('images/forgotten_login.png')}}" alt="">

                                            <h1 class="h4 text-gray-900 mb-4">Welcome Back To School Login!</h1>
                                        </div>
                                        <form method="post" action="{{route('school.login.submit')}}" class="user" novalidate>
                                            {{ csrf_field() }}
                                            <div class="form-group">
                                                <input type="email" name="email" class="form-control form-control-user" id="email" aria-describedby="emailHelp" placeholder="Enter Email Address..." required="true">
                                                <div class="invalid-feedback">
                                                    Email field is required.
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <input type="password" name="password" class="form-control form-control-user" id="password" placeholder="Password" required="true">
                                                <div class="invalid-feedback">
                                                    Password field is required.
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox small">
                                                    <input type="checkbox" name="remember" class="custom-control-input" id="customCheck">
                                                    <label class="custom-control-label" for="customCheck">Remember Me</label>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                                Login
                                            </button>

                                        </form>
                                        <hr>
                                        <div class="text-center">
                                            <a class="small" href="{{route('school.forgotpassword')}}">Forgot Password?</a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
                var forms = document.getElementsByClassName('user');
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
@endpush