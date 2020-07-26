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
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-2">Reset Your New Password</h1>
                  </div>
                  <form class="user" method="post" action="{{route('school.resetpassword')}}" oninput='password_confirmation.setCustomValidity(password_confirmation.value != password.value ? "Password did not matched." : "")'>
                      {{csrf_field()}}
                      <div class="form-group">
                      <input type="hidden" class="form-control" id="token" name="token"  required="true" value="{{$token}}">
                            <label for="level">Password</label>
                            <input type="password" class="form-control" id="password" name="password"  required="true" value="{{old('password')}}">
                            <div class="invalid-feedback">
                                Please Provide a Password.
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="level">Confirm Password</label>
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"  required="true" value="{{old('password_confirmation')}}">
                            <div class="invalid-feedback">
                                Password doesnot matched.
                            </div>
                        </div>
                    <button type="submit" class="btn btn-primary btn-user btn-block">
                      Reset Password
                    </button>
                  </form>
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