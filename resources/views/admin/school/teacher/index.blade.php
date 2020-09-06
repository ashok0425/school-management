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
                    <h6 class="m-0 font-weight-bold text-primary pt-2">Teachers Data</h6>
                    <a href="{{route('school.assignteacher.create')}}" class="btn btn-primary pull-right float-right">
                        <i class="fas fa-plus pr-2"></i>Assign Teacher Username and Password</a>
                    <a href="{{route('school.teacher.create')}}" class="btn btn-primary pull-right float-right">
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
                                        <a href="{{route('school.teacher.edit',['user'=>$user->id])}}"
                                           class="btn btn-primary btn-circle mr-2">
                                            <i class="fas fa-user-edit"></i>
                                        </a>
                                        <a href="{{route('school.teacher.delete',['user'=>$user->id])}}}"
                                           class="btn btn-danger btn-circle mr-2">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                        <form style="display: flex" action="/school/toogleteacher/{{ $user->id }}" method="post" onSubmit="return confirm('Are u sure you want to make this change ?')">
                                            {{csrf_field()}}
                                            {{ method_field('PATCH') }}
                                            <p class="text-success text-sm-center mr-2">Unblock</p>
                                            <label class="switch">
                                                <input type="checkbox" {{ $user->status == 1 ? 'checked' : ''}}  onChange="this.form.submit()" name="status">
                                                <span class="slider round"></span>
                                            </label>
                                            <p class="text-success text-sm-center ml-2">Block</p>
                                        </form>
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