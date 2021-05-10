@extends('admin.school.dashboard')
@section('dashboard-body')
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
           @include('admin.layout.validation-error')
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Edit Student:{{$student->name}}</h6>
                </div>
                <div class="card-body">
                    <form method="post" action="{{route('school.student.update',['student'=>$student->id])}}" class="create-teacher" novalidate  enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="name">Full Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Student Name" required="true" value="{{$student->name}}">
                            <div class="invalid-feedback">
                                Please provide a Student name.
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="contact">Phone No</label>
                            <input type="contact" class="form-control" id="phonno" name="phonno" placeholder="98******" required="true" value="{{$student->phonno}}">
                            <div class="invalid-feedback">
                                Please provide a valid phone number.
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="contact">Gurdian No</label>
                            <input type="contact" class="form-control" id="gurdian_no" name="gurdian_no" placeholder="98******" required="true" value="{{$student->gurdian_no}}">
                            <div class="invalid-feedback">
                                Please provide a valid Gurdian Contact Number.
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="contact">Address</label>
                            <input type="contact" class="form-control" id="address" name="address" placeholder="Butwal" required="true" value="{{$student->address}}">
                            <div class="invalid-feedback">
                                Please provide a valid Address.
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="sel1">Select Class:</label>
                            <select class="custom-select" id="klass" name="klass" required="true">
                                <option data-section="[]">----Select Class----</option>
                                @foreach($klasses as $klass)
                                <option value="{{$klass->id}}" data-section='<?php echo json_encode($klass)?>' {{$klass->id==$student->class_id?'selected':''}}>{{$klass->class}}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">
                                Please Selec a Class.
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="sel1">Select Section:</label>
                            <select class="custom-select" id="section" name="section" required="true">
                                <option>----Select Section----</option>
                                @foreach($sections as $section)
                                 <option value="{{$section->id}}" {{$section->id==$student->section_id?'selected':''}}>{{$section->section}}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">
                                Please Select a Section.
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="contact">Roll No</label>
                            <input type="contact" class="form-control" id="roll_no" name="roll_no" placeholder="1" required="true" value="{{$student->roll_no}}">
                            <div class="invalid-feedback">
                                Please provide a Student Roll No.
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="student@mail.com" required="true" value="{{$student->email}}">
                            <div class="invalid-feedback">
                                Please provide a valid email address.
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
                                @if(isset($student->image))
                                    <img src="{{$student->image}}" id="preview" class="img-thumbnail" style="width:80px;height:80px;">
                                @else
                                    <img src="https://placehold.it/80x80" id="preview" class="img-thumbnail" style="width:80px;height:80px;">
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
    </script>
     <script>
        $('#klass').on('change', function (e) {
            $("#section").empty();
            // var optionSelected = $("option:selected", this);
            var optionSelected = $(this).find("option:selected");
            var dataSection   = JSON.parse(optionSelected.attr("data-section"));
            
            $.each(dataSection.sections, function (i, item) {
                $('#section').append($('<option>', { 
                    value: item.id,
                    text : item.section 
                }));
            });
            
        });
    </script>
@endpush