@extends('admin.school.dashboard')
@section('dashboard-body')
<!-- Page Heading -->

<div class="row">
  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 m-auto">
    <div class="card shadow mb-4">
      <div class="card-header py-3 d-flex justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary pt-2">Assign Subject Teacher List</h6>


        <a href="#" data-subid="{{$subInfo->id}}" data-classid="{{$data->sections[0]->class_id}}" class="btn btn-primary pull-right mr-2 assignSubjectTeacher" data-toggle="modal" data-target="#assignSubjectTeacher">
          <i class="fas fa-filter pr-2"></i>Assign {{$subInfo->subject}} Teacher</a>
        </div>
        <div class="card-body">
          <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item active" aria-current="page">{{ucfirst($data->level->level)}}</li>
              <li class="breadcrumb-item"><a href="#"></a>{{ucfirst($data->class)}}</li>
              <li class="breadcrumb-item active" aria-current="page">{{ucfirst($data->sections[0]->section)}}</li>
            </ol>
          </nav>
          <div class="table">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Subject</th>
                  <th>Email</th>
                  <th>Contact No.</th>
                  
                </tr>
              </thead>
              <tbody>
               @foreach($subteacher as $key => $teacher)
               <tr>
                <td>{{$teacher->teacher->name}}</td>
                <td>{{$teacher->teacher->email}}</td>
                <td>{{$teacher->teacher->contactno}}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>



<!-- Assign Subject Teacher -->
<div id="assignSubjectTeacher" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Assign {{$subInfo->subject}}Teacher</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <form action="{{__setLink('school/subject/insertSubjectTeacher')}}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
              <input type="hidden" name="subject_id" id="submitSubjectId" value="
              ">
              <input type="hidden" name="class_id" id="classId" value="
              ">


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
                <span class="text">Assign Teacher</span>
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
    $('.assignSubjectTeacher').click(function() {
      var val = $(this).attr('data-subid');
      var val2 = $(this).attr('data-classid');
      $('#submitSubjectId').val(val);
      $('#classId').val(val2);
    });
  });
</script>
@endsection

