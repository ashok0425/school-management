@extends('admin.admin.dashboard')
@section('admin-dashboard-body')
    <!-- Page Heading -->
        
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 m-auto">
          <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between">
              <h6 class="m-0 font-weight-bold text-primary pt-2">Gallery Data</h6>
              <a href="{{__setLink('admin/gallery/create')}}"  class="btn btn-primary pull-right float-right">
                  <i class="fas fa-plus pr-2"></i>Create Gallery</a>
            </div>
            <div class="card-body">

              <div class="table">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>SN</th>
                      <th>Title</th>
                      <th>Detail</th>
                      <th>Thumbnail</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($gallery as $info)
                      <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$info->title}}</td>
                        <td>{!! $info->detail!!}</td>
                        <td><img src="{{asset('storage/'.$info->thumbnail)}}" alt="{{$info->thumbnail}}" width="100"></td>

                        <td>
                          <a href="{{__setLink('admin/imagegallery/__list',['gallery_id'=>$info->id])}}" class="btn btn-info btn-circle">
                            <i class="fas fa-plus"></i>
                          </a>
                            <a href="{{__setLink('admin/gallery/edit',['gallery_id'=>$info->id])}}" class="btn btn-primary btn-circle">
                              <i class="fas fa-edit"></i>
                            </a>
                            
                            <a href="#" class="btn btn-danger btn-circle" data-toggle="modal" data-target="#exampleModalCenter" data-id="{{__setLink('admin/gallery/delete',['gallery_id'=>$info->id])}}" id="delete">
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



<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Are you sure want to delete</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
     
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
        <a href="" class="btn btn-primary" id="link">Yes</a>
      </div>
    </div>
  </div>
</div>
@stop
@push('scripts')

   <script>
          $(document).ready(function() {
            $('#delete').click(function(){
              let data=$(this).data('id');
$('#link').attr('href',data)
            });
        });
  </script>

@endpush