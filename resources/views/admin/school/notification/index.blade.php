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
                <h6 class="m-0 font-weight-bold text-primary pt-2">Notification Data</h6>
                <a href="{{__setLink('school/notification/create')}}" class="m-0 btn btn-warning">Add Notification</a>

              
                        </div>
                        <div class="card-body">
                            <div class="table">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>Image</th>
                                            <th>Type</th>
                                            <th>Class</th>
                                            <th>Section</th>

                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($notification as $notif)
                                        <tr>
                                            <td>{{$notif->title}}</td>
                                            <td>{{$notif->description}}</td>
                                            <td><img src="{{asset('storage/'.$notif->image)}}" alt="{{$notif->image }}" width="80"></td>

                                            <td>{{$notif->type}}</td>
                                            <td>{{$notif->kla }}</td>
                                            <td>{{$notif->sec }}</td>

                                            <td>
                                              
                                               <a href="{{__setLink('school/notification/delete',['notification_id'=>$notif->id])}}}"
                                                   class="btn btn-danger btn-circle">
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
 