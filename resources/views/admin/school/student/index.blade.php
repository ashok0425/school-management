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
              <a href="{{route('school.student.create')}}"  class="btn btn-primary pull-right float-right">Create Student</a>
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
                        <td>{{$student->section->section}}</td>
                        <td> 
                           @if(isset($student->image))
                              <img src="{{$student->image}}" id="preview" class="img-thumbnail" style="width:30px;height:30px;">

                            @else
                              <img src="{{asset('admin/img/user.png')}}" id="preview" class="img-thumbnail" style="width:30px;height:30px;">
                            @endif
                        </td>
                        <td>
                          <a href="{{route('school.student.edit',['student'=>$student->id])}}" class="btn btn-primary btn-circle">
                            <i class="fas fa-user-edit"></i>
                          </a>
                          <a href="{{route('school.student.delete',['student'=>$student->id])}}}" class="btn btn-danger btn-circle">
                            <i class="fas fa-trash"></i>
                          </a>
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
@stop