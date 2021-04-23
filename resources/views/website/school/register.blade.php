@extends('website.layouts.main')
@section('page')
<div class="col-xs-12 offset-sm-2 col-sm-8 offset-md-2 col-md-8 offset-lg-2 col-lg-8  school-register-form m-t-15">

 @include('admin.layout.validation-error')


 <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Create School</h6>
    </div>
    <div class="card-body">
        <form method="post" action="{{route('school.register')}}" class="class" novalidate enctype="multipart/form-data" oninput='password_confirmation.setCustomValidity(password_confirmation.value != password.value ? "Password did not matched." : "")'>
            {{csrf_field()}}
            <div class="form-group">
                <label for="level">School Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter School Name" required="true" value="{{old('name')}}">
                <div class="invalid-feedback">
                    Please provide a School Name.
                </div>
            </div>
            <div class="form-group">
                <label for="level">Choose Your Country</label>
                <select name="country" class="custom-select">
                  <option selected>Open this select country</option>
                  @foreach($countries as $key => $country)
                        <option style="background-image:{{asset('flags/AD-32.png')}};" value="<?php echo $country->country_id.','. $country->country_code.','.$country->country_name;?>">{{$country->country_name}}
                            
                        </option>
                  @endforeach
              </select>
          </div>

          <div class="form-group">
            <label for="level"> Address</label>
            <input type="text" class="form-control" id="address" name="address" placeholder="Enter School Address" required="true" value="{{old('address')}}">
            <div class="invalid-feedback">
                Please provide a School Address.
            </div>
        </div>
        <div class="form-group">
            <label for="level"> Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="school@email.com" required="true" value="{{old('email')}}">
            <div class="invalid-feedback">
                Please provide a School Email Address.
            </div>
        </div>
        <div class="form-group">
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
        <div class="form-group">
            <label for="level">PAN No</label>
            <input type="text" class="form-control" id="panno" name="panno" placeholder="Enter School Pan No" required="true" value="{{old('panno')}}">
            <div class="invalid-feedback">
                Please provide a School Pan No.
            </div>
        </div>
        <div class="form-group">
            <label for="level">Contact</label>
            <input type="text" class="form-control" id="contact" name="contact" placeholder="Enter School Contact Number" required="true" value="{{old('contact')}}">
            <div class="invalid-feedback">
                Please provide a School Name.
            </div>
        </div>
        <div class="form-group">
            <label for="level">School Motto</label>
            <textarea class="form-control" id="school_motto"  name="school_motto" rows="3"></textarea>
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
            <img id="preview_img" src="https://via.placeholder.com/150" class="m-2" width="150" height="150"/>
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
@endpush