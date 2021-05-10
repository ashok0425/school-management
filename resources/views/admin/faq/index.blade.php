@extends('admin.admin.dashboard')
@section('admin-dashboard-body')
    <!-- Page Heading -->
        
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 m-auto">
          <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between">
              <h6 class="m-0 font-weight-bold text-primary pt-2">Faq Data</h6>
              <a href="{{__setLink('admin/faq/create')}}"  class="btn btn-primary pull-right float-right">
                  <i class="fas fa-plus pr-2"></i>Create Faq</a>
            </div>
            <div class="card-body">

              <div class="table">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>SN</th>

                      <th>Question</th>
                      <th>descriptionwer</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  
                  <tbody>
                    @foreach($faq as $info)
                      <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$info->title}}</td>
                        <td>{{$info->description}}</td>
                        <td>
                            <a href="{{__setLink('admin/faq/edit',['faq_id'=>$info->id])}}" class="btn btn-primary btn-circle">
                              <i class="fas fa-edit"></i>
                            </a>
                            <a href="{{__setLink('admin/faq/delete',['faq_id'=>$info->id])}}}" class="btn btn-danger btn-circle">
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