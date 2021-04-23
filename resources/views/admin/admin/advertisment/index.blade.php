@extends('admin.admin.dashboard')
@section('admin-dashboard-body')
    <!-- Page Heading -->
        
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 m-auto">
          <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between">
              <h6 class="m-0 font-weight-bold text-primary pt-2">Advertisments Data</h6>
              <a href="{{__setLink('admin/advertisement/create')}}"  class="btn btn-primary pull-right float-right">
                  <i class="fas fa-plus pr-2"></i>Create Advertisement</a>
            </div>
            <div class="card-body">

              <div class="table">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>SN</th>
                      <th>Title</th>
                      <th>Link</th>
                      <th>Image</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  
                  <tbody>
                    @foreach($advertisements as $advertisement)
                      <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$advertisement->title}}</td>
                        <td>{{$advertisement->link}}</td>
                        <td><img src="{{$advertisement->image_path}}" /></td>
                        <td>
                            <a href="{{route('admin.advertisement.edit',['advertisement'=>$advertisement->id])}}" class="btn btn-primary btn-circle">
                              <i class="fas fa-edit"></i>
                            </a>
                            <a href="{{route('admin.advertisement.delete',['advertisement'=>$advertisement->id])}}}" class="btn btn-danger btn-circle">
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