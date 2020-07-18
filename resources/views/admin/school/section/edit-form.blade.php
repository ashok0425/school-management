@extends('admin.school.dashboard')
@section('dashboard-body')
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            
           @include('admin.layout.validation-error')
          
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Edit Section: {{$section->section}}</h6>
                </div>
                <div class="card-body">
                    <form method="post" action="{{route('school.section.update',['section'=>$section->id])}}" class="class" novalidate >
                    {{csrf_field()}}
                        <div class="form-group">
                            <label for="level">Section</label>
                            <input type="text" class="form-control" id="section" name="section" placeholder="Eneter Section" required="true" value="{{$section->section}}">
                            <div class="invalid-feedback">
                                Please provide a Section.
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="sel1">Select Class:</label>
                            <select class="custom-select" id="class" name="class" required="true">
                                @foreach($classes as $class)
                                <option value="{{$class->id}}" "{{$section->klass->class_id==$class->id?'selected':''}}">{{$class->class}}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">
                                Please Selec a Class.
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
@endpush