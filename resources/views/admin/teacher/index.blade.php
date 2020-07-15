@extends('admin.dashboard')
@section('dashboard-body')
    <!-- Page Heading -->
   
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">Teacher</li>
      </ol>
    </nav>
        
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
              <h6 class="m-0 font-weight-bold text-primary pt-2">Teachers Data</h6>
              <a href="{{route('admin.teacher.create')}}"  class="btn btn-primary pull-right float-right">Create Teacher</a>
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
                  <tfoot>
                    <tr>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Contact</th>
                      <th>Image</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    @foreach($users as $user)
                      <tr>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->contact}}</td>
                        
                        <td> 
                           @if(isset($user->image))
                              <img src="{{$user->image}}" id="preview" class="img-thumbnail" style="width:30px;height:30px;">

                            @else
                              <img src="{{asset('admin/img/user.png')}}" id="preview" class="img-thumbnail" style="width:30px;height:30px;">
                            @endif
                        </td>
                        <td>
                          <a href="{{route('admin.teacher.edit',['user'=>$user->id])}}" class="btn btn-primary btn-circle">
                            <i class="fas fa-user-edit"></i>
                          </a>
                          <a href="{{route('admin.teacher.delete',['user'=>$user->id])}}}" class="btn btn-danger btn-circle">
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