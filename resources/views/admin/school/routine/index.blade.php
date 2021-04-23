@extends('admin.school.dashboard')
@section('dashboard-body')
    <!-- Page Heading -->
        
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 m-auto">
          <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between">
              <h6 class="m-0 font-weight-bold text-primary pt-2">Routine List</h6>
              <a href="{{__setLink('school/routine/create/view')}}"  class="btn btn-primary pull-right float-right">
                  <i class="fas fa-plus pr-2"></i>Create Routine</a>
            </div>

              <div class="row  m-2">
            <div class="col-sm-3">
             <select name='class_id' id="classNameId" class="custom-select">
              <option selected>Open this select Class</option>
              @foreach($classes as $class)
              <option value="<?php echo $class->id?>">{{$class->class}}</option>
              @endforeach
            </select>
          </div>
          <div class="col-sm-1"></div>
          <div class="col-sm-3">
           <select name="section_id" id="sectionOption" class="custom-select">
            <option selected>Open this select Section</option>
            
          </select>

        </div>
          <div class="col-sm-1"></div>
          <div class="col-sm-3">
           <select name='day_name' class="custom-select">
            <option selected>Choose Day</option>
            <option value="sunday">Sunday</option>
            <option value="monday">Monday</option>
            <option value="tuesday">Tuesday</option>
            <option value="wednesday">Wednesday</option>
            <option value="thursday">Thursday</option>
            <option value="friday">Friday</option>
          </select>

        </div>
      </div>
            <div class="card-body">

              <div class="table">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
              <th>Assign</th>
              <th>Day</th>
              <th>period 1</th>
              <th>period 2</th>
              <th>period 3</th>
              
            </tr>
                  </thead>
                  <tbody id="routineInfo">
                    <tr>
                      <td>Subject <br> Teacher</td>
                    
                    
                    </tr>
                     
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        
    </div>
@stop
@include('admin.school.routine.parts.add-section-by-class')
@push('scripts')
<script>
  $(document).ready(function(){
    $('#sectionOption').change(function(){
      let class_id = $('#classNameId').val();
      let section_id = $(this).val();
      console.log(class_id, section_id);
      $.ajax({
        type: 'POST',
        url: `{{route('school.routine.by.filter')}}`,
        data: {
          "class_id": $('#classNameId').val(),
          "section_id" : $(this).val(),
          "_token": "{{ csrf_token()}}",
        },
        success: function(data) {
          // console.log(data.teachers.day)
          // console.log(data.teachers.teacher_period_1.name);

          $.each(data, function(index, value){
          $('.dataTables_empty').hide();
          let key = 0;
          $('#routineInfo').append(`<tr>
          <td>teacher name
          <br>
          subject name
          </td>
          <td>${value.day}</td>
          <td>${(value[key])?value[key].name:''}</td>
          <td>${(value[++key])?value[++key].name: 'teacher not assigned'}</td>
          <td>${(value[++key])?value[++key].name: 'teacher not assigned'}</td>
          <td>${(value[++key])?value[++key].name: 'teacher not assigned'}</td>
          <td>${(value[++key])?value[++key].name: 'teacher not assigned'}</td>
          <td>${(value[++key])?value[++key].name: 'teacher not assigned'}</td>
          <td>${(value[++key])?value[++key].name: 'teacher not assigned'}</td>
          <td>${(value[++key])?value[++key].name: 'teacher not assigned'}</td>
          </tr>`)
          });


          // let html = `<tr>
          // <td>subject name
          // <br>
          // teacher name
          // </td>
          // <td>sunday</td>
          // <td>data one</td>
          // <td>data two</td>
          // <td>data three</td>
          // <td>data four</td>
          // <td>data five</td>
          // <td>data six</td>
          // <td>data seven</td>
          // <td>data eight</td>
          // </tr>`;

          // $('.dataTables_empty').hide();
          // $('#routineInfo').append(html);
          // $.each(data, function(index, value){
          // $('#routineInfo').append(`<tr>
          //   <td> ${value.day} </td>
          //   <td> ${value.teacher_period_1.name} </td>
          //   </tr>`)
          // });
        }
      });
    });
  });
</script>

@endpush
