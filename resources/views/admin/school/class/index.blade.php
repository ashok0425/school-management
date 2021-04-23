@extends('admin.school.dashboard')
@section('dashboard-body')
    <!-- Page Heading -->
        
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 m-auto">
          <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between">
              <h6 class="m-0 font-weight-bold text-primary pt-2">Class Data</h6>
              <a href="{{__setLink('school/class/create')}}"  class="btn btn-primary pull-right float-right">
                  <i class="fas fa-plus pr-2"></i>Create Class</a>
            </div>
            <div class="card-body">

              <div class="table">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Class</th>
                      <th>Level</th>
                      <th>Class Teacher</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($classes as $key => $value)
                      <tr>
                        <td>{{$value->class}}</td>
                        <td>{{$value->level->level}}</td>
                        <td>{{$value->name}}</td>
                           
                        <td>
                            <a href="{{__setLink('school/class/edit',['id'=>$value->id])}}" class="btn btn-primary btn-circle">
                              <i class="fas fa-edit"></i>
                            </a>
                            <a href="{{__setLink('school/class/delete',['id'=>$value->id])}}}" class="btn btn-danger btn-circle">
                              <i class="fas fa-trash"></i>
                            </a>
                            <a href="#" data-item="{{$value->id}}" class="btn btn-primary pull-right mr-2 assignClassTeacher" data-toggle="modal" data-target="#assignClassTeacher">
                           
                                <i class="fas fa-tasks pr-2"></i>Assign Class Teacher</a>
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

    <!-- Assign Class Teacher -->
        <div id="assignClassTeacher" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Assign Class Teacher</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <form action="{{ __setLink('school/assignClassTeacher') }}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group">
                                  <input type="hidden" name="class_id" id="submitClassId" value="">
                                    <label for="email">Select Teacher</label>

                                    <select name="teacher_id" class="custom-select" required>
                                        <option selected>Open this select menu</option>
                                        @foreach($teachers as $key => $teacher)
                                            <option value="<?php echo $teacher->id?>">{{$teacher->name}}</option>
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

@section('script')
  <script type="text/javascript">
    $(document).ready(function(){
      $('.assignClassTeacher').click(function() {
        var val = $(this).attr('data-item');
        $('#submitClassId').val(val);
      });
    });
      // var val = document.getElementById("classID").value;
      // document.getElementById('class_id').value = val;
  </script>
@endsection