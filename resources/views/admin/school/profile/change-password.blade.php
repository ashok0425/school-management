@extends('admin.school.dashboard')
@section('dashboard-body')
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            @include('admin.layout.validation-error')
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Change Password</h6>
                   
                </div>
                <div class="card-body">
                    <form method="post" action="{{route('school.change.password')}}" class="change-password" novalidate >
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="level">Current Password</label>
                            <input type="password" class="form-control" id="current_password" name="current_password"  required="true" value="{{old('current_password')}}">
                            <div class="invalid-feedback">
                                Please provide a Current Password.
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="level">New Password</label>
                            <input type="password" class="form-control" id="password" name="password"  required="true" value="{{old('password')}}">
                            <div class="invalid-feedback">
                                Please Provide a New Password.
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="level">Confirm Password</label>
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"  required="true" value="{{old('password_confirmation')}}">
                            <div class="invalid-feedback">
                                Please provide a Confirm Password.
                            </div>
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
@endpush
