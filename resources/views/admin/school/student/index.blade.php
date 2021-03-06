@extends('admin.school.dashboard')
@section('dashboard-body')
<!-- Page Heading -->
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 m-auto">
        @if(Session::has('success'))
        toastr.success("{{ Session::get('success') }}");
        @endif
        @if(Session::has('error'))
        toastr.warning("{{ Session::get('error') }}");
        @endif

        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary pt-2">Students Data</h6>
                <div class="float-right">
                    <a href="{{__setLink('school/assign-student/create')}}" class="btn btn-primary pull-right mr-2">
                        <i class="fas fa-plus pr-2"></i> Assign Student Username and Password</a>
                        <a href="{{ asset('/sample.xlsx') }}" class="btn btn-primary pull-right mr-2" download>
                            <i class="fas fa-download pr-2"></i> Download sample
                        </a>
                        <a href="#" class="btn btn-primary pull-right mr-2" data-toggle="modal" data-target="#myModal">
                            <i class="fas fa-upload pr-2"></i> Upload File</a>

                            <a href="#" class="btn btn-primary pull-right mr-2" data-toggle="modal" data-target="#stsFilter">
                                <i class="fas fa-filter pr-2"></i>Filter Student</a>
                                
                                <a href="{{__setLink('school/student/create')}}" class="btn btn-primary pull-right float-right">
                                    <i class="fas fa-plus pr-2"></i>Create
                                Student</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Contact</th>
                                            <th>Class</th>
                                            <th>Section</th>
                                            <th>Image</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($students as $student)
                                        <tr>
                                            <td>{{$student->name}}</td>
                                            <td>{{$student->email}}</td>
                                            <td>{{$student->phonno}}</td>
                                            <td>{{$student->klass->class}}</td>
                                            <td>{{$student->section->section }}</td>
                                            <td>
                                                @if(isset($student->image))
                                                <img src="{{ asset('/storage') . '/' . $student->image }}" id="preview"
                                                class="img-thumbnail" style="width:30px;height:30px;">

                                                @else
                                                <img src="{{asset('admin/img/user.png')}}" id="preview"
                                                class="img-thumbnail" style="width:30px;height:30px;">
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{__setLink('school/student/edit',['id'=>$student->id])}}"
                                                   class="btn btn-primary btn-circle">
                                                   <i class="fas fa-user-edit"></i>
                                               </a>
                                               <a href="{{__setLink('school/student/delete',['id'=>$student->id])}}}"
                                                   class="btn btn-danger btn-circle">
                                                   <i class="fas fa-trash"></i>
                                               </a>
                                            <!--    <form style="display: flex" action="/school/togglestudent/{{ $student->id }}" method="post" onclick="return confirm('Are u sure you want to make this change ?')">
                                                {{csrf_field()}}
                                                <p class="text-success text-sm-center mr-2">Unblock</p>
                                                <label class="switch">
                                                    <input type="checkbox" {{ $student->status == 1 ? 'checked' : ''}}  onChange="this.form.submit()" name="status">
                                                    <span class="slider round"></span>
                                                </label>
                                                <p class="text-success text-sm-center ml-2">Block</p>
                                            </form> -->

                                             <p class="text-success text-sm-center mr-2">Unblock</p>
                                        <label class="switch" id="toggleTeacher">
                                            <input user_id="{{$student->id}}"   type="checkbox" {{ $student->status == 1 ? 'checked' : ''}}  
                                            name="status"   >
                                            <span class="slider round"></span>
                                        </label>
                                         <p class="text-success text-sm-center ml-2">Block</p>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Class filter Model -->
        <div id="stsFilter" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Filter</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <form action="{{ __setLink('school/student/filter') }}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="email">Select class</label>

                                    <select name="class" class="custom-select" required>
                                        <option selected>Open this select menu</option>
                                        @foreach($classes as $key => $class)
                                        <option value="<?php echo $class->id; ?>">{{$class->class}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="float-right">
                                    <button type="submit" id="submitButton" class="btn btn-primary btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-check"></i>
                                        </span>
                                        <span class="text">Apply Filter</span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>

        <!-- Upload file  Modal -->
        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Upload File</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <form action="{{ __setLink('school/uploadexcel') }}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="email">Excem file</label>
                                    <input type="file" name="select_file" class="file file-img-preview" accept="application/vnd.ms-excel" >
                                    <div class="input-group my-3">
                                        <input type="text" class="form-control" disabled placeholder="Upload File"
                                        id="file">
                                        <div class="input-group-append">
                                            <button type="button" class="browse btn btn-primary">Browse...</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="float-right">
                                    <button type="submit" id="submitButton" class="btn btn-primary btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-check"></i>
                                        </span>
                                        <span class="text">Upload</span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>
        @stop
    @include('admin.layout.block-unblock-student')
        @push('scripts')
        <script>
            $(document).on("click", ".browse", function () {
                var file = $(this).parents().find(".file");
                file.trigger("click");
            });
            $('input[type="file"]').change(function (e) {
                var fileName = e.target.files[0].name;
                $("#file").val(fileName);

                var reader = new FileReader();
                reader.onload = function (e) {
                // get loaded data and render thumbnail.
                document.getElementById("preview").src = e.target.result;
            };
            // read the image file as a data URL.
            reader.readAsDataURL(this.files[0]);
        });
 </script>
 @endpush