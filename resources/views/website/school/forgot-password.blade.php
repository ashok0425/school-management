@extends('website.layouts.main')
@section('page')
<div class="row justify-content-center">
@include('admin.layout.validation-error')
      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block"><img src="{{asset('images/forgotten_login.png')}}" alt="" style="width:100%"></div>
              <div class="col-lg-6">
                <div class="p-5">
                @if(session()->has('user'))
                  <form action="{{route('school.resendverfication')}}" method="post">
                      {{csrf_field()}}
                  <div class="text-center">
                    <input type="hidden" name="cemail" class="form-control form-control-user" id="cemail" aria-describedby="emailHelp" placeholder="Enter Email Address..." required="true" value="{{Session::get('user')->email}}">
                    <h1 class="h4 text-gray-900 mb-2">Your email is not verified now.Check your email for verification Link . If you didnot get any email then click the button below</h1>
                    <p class="mb-4"><button type="submit" class="btn btn-small btn-primary">Resend verification Link</button></p>
                  </div>
                </form>
                  @endif
                  <div class="text-center">

                    <h1 class="h4 text-gray-900 mb-2">Forgot Your Password?</h1>
                    <p class="mb-4">We get it, stuff happens. Just enter your email address below and we'll send you a link to reset your password!</p>
                  </div>
                 
                  <form class="user" method="post" action="{{route('school.forgotpassword')}}">
                      {{csrf_field()}}
                    <div class="form-group">
                      <input type="email" name="email" class="form-control form-control-user" id="email" aria-describedby="emailHelp" placeholder="Enter Email Address..." required="true">
                    </div>
                    <button type="submit" class="btn btn-primary btn-user btn-block">
                      Reset Password
                    </button>
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="{{route('school.register')}}">Create an Account!</a>
                  </div>
                  <div class="text-center">
                    <a class="small" href="{{route('school.login')}}">Already have an account? Login!</a>
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