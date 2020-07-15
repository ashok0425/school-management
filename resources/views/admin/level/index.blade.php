@extends('admin.dashboard')
@section('dashboard-body')
    <!-- Page Heading -->
   
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">Level</li>
      </ol>
    </nav>
        
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 m-auto">
          <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between">
              <h6 class="m-0 font-weight-bold text-primary pt-2">Levels Data</h6>
              <a href="{{route('admin.level.create')}}"  class="btn btn-primary pull-right float-right">Create Level</a>
            </div>
            <div class="card-body">

              <div class="table">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Level</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Level</th>
                     
                      <th>Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    @foreach($levels as $level)
                      <tr>
                        <td>{{$level->level}}</td>
                        
                        <td>
                          <a href="{{route('admin.level.edit',['level'=>$level->id])}}" class="btn btn-primary btn-circle">
                            <i class="fas fa-edit"></i>
                          </a>
                          <a href="{{route('admin.level.delete',['level'=>$level->id])}}}" class="btn btn-danger btn-circle">
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