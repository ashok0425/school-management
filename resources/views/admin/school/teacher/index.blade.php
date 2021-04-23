@extends('admin.school.dashboard')
@section('dashboard-body')
<!-- Page Heading -->
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 m-auto">
        <!-- @if(Session::has('success'))
        toastr.success("{{ Session::get('success') }}");
        @endif
        @if(Session::has('error'))
        toastr.warning("{{ Session::get('error') }}");
        @endif -->
        <div id="jsnotification"></div>

        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary pt-2">Teachers Data</h6>
                <a href="{{__setLink('school/assign-teacher/create')}}" class="btn btn-primary pull-right float-right">
                    <i class="fas fa-plus pr-2"></i>Assign Teacher Username and Password</a>
                    <a href="#" class="btn btn-primary pull-right mr-2" data-toggle="modal" data-target="#teacherFilter">
                        <i class="fas fa-filter pr-2"></i>Filter Teacher</a>
                        <a href="{{__setLink('school/teacher/create')}}" class="btn btn-primary pull-right float-right">
                            <i class="fas fa-plus pr-2"></i>Create
                        Teacher</a>
                    </div>
                    <div class="card-body">
                        <div class="table">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Contact</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach($users as $user)
                                    <tr>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->contactno}}</td>

                                        <td>
                                            @if(isset($user->image))
                                            <img src="{{ asset('/storage') . '/' .$user->image }}" id="preview" class="img-thumbnail"
                                            style="width:30px;height:30px;">

                                            @else
                                            <img src="{{asset('admin/img/user.png')}}" id="preview"
                                            class="img-thumbnail" style="width:30px;height:30px;">
                                            @endif
                                        </td>
                                        <td style="display: flex">
                                            <a href="{{__setLink('school/teacher/edit',['user'=>$user->id])}}"
                                               class="btn btn-primary btn-circle mr-2">
                                               <i class="fas fa-user-edit"></i>
                                           </a>
                                           <a href="{{__setLink('school/teacher/delete',['user'=>$user->id])}}}"
                                               class="btn btn-danger btn-circle mr-2">
                                               <i class="fas fa-trash"></i>
                                           </a>
                                       <!--   <form  id="blockTeacher" style="display: flex" action="/school/toogleteacher/{{ $user->id }}" method="post" >
                                            {{csrf_field()}}
                                            <p class="text-success text-sm-center mr-2">Unblock</p>
                                            <label class="switch">
                                                <input type="checkbox" {{ $user->status == 1 ? 'checked' : ''}}  onChange="this.form.submit()" name="status">
                                                <span class="slider round"></span>
                                            </label>
                                            <p class="text-success text-sm-center ml-2">Block</p>
                                        </form> -->
                                         <p class="text-success text-sm-center mr-2">Unblock</p>
                                        <label class="switch" id="toggleTeacher">
                                            <input user_id="{{$user->id}}"   type="checkbox" {{ $user->status == 1 ? 'checked' : ''}}  
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

    <!-- Teacher filter Model -->
    <div id="teacherFilter" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Teacher Filter</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <form action="{{ __setLink('school/teacher/filter') }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="email">Select class</label>

                                <select name="class_id" class="custom-select" required>
                                    <option selected>Open this select menu</option>
                                    @foreach($classes as $key => $class)
                                    <option value="<?php echo $class->id?>">{{$class->class}}</option>
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
    @stop
@include('admin.layout.block-unblock-teacher')

   