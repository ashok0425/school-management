@extends('admin.dashboard')
@section('dashboard-body')
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            
           @include('admin.layout.validation-error')
           <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">Create Class</li>
                </ol>
            </nav>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Create Class</h6>
                </div>
                <div class="card-body">
                    <form method="post" action="{{route('admin.class.save')}}" class="class" novalidate >
                        @csrf
                        <div class="form-group">
                            <label for="level">Class</label>
                            <input type="text" class="form-control" id="class" name="class" placeholder="Eneter Class" required="true" value="{{old('class')}}">
                            <div class="invalid-feedback">
                                Please provide a Class.
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="sel1">Select Level:</label>
                            <select class="custom-select" id="level" name="level" required="true">
                                <option>----Select Level----</option>
                                @foreach($levels as $level)
                                <option value="{{$level->id}}">{{$level->level}}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">
                                Please Selec a level.
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