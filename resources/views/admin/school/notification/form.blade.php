@extends('admin.school.dashboard')
@section('dashboard-body')
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
 <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Create Student</h6>
    </div>
    <div class="card-body">
        <form method="post" action="{{__setLink('school/notification/store')}}" class="create-teacher" novalidate  enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="form-group">
                <label for="name">Title</label>
                <input type="text" class="form-control" id="name" name="title" placeholder="Notification Title" required="true" value="{{old('title')}}">
                <div class="invalid-feedback">
                    Please provide a Student name.
                </div>
            </div>
            <div class="form-group">
                <label for="contact">Description</label>
                <input type="text" class="form-control"  name="description" placeholder="Notification Description"  value="{!!old('description')!!}">
                <div class="invalid-feedback">
                    Please provide a Description.
                </div>
            </div>
          
            <div class="form-group">
                <label for="sel1">Notification type:</label>
                <select class="custom-select" id="type" name="type" required="true">
                    <option value="">--Choose Type--</option>

                    <option value="student">Student</option>
                    <option value="teacher">Teacher</option>

                </select>
                <div class="invalid-feedback">
                    Please Select a Type.
                </div>
            </div>
            <div class="form-group d-none classes">
                <label for="sel1">Select Class:</label>
                <select class="custom-select" id="class" name="class" >
                    <option value="">----Select Section----</option>
                    @foreach ($class as $item)
                    <option value="{{$item->id}}">{{$item->class}}</option>
                        
                    @endforeach
                </select>
                <div class="invalid-feedback">
                    Please Select a Class.
                </div>
            </div>
            <div class="form-group d-none sections">
                <label for="sel1">Select Section:</label>
                <select class="custom-select" id="section" name="section" >
                    <option>----Select Section----</option>
                 
                        
                </select>
                <div class="invalid-feedback">
                    Please Select a Section.
                </div>
            </div>
            
            <div class="form-group">
                <label for="email">Image</label>
                <input type="file" name="image" class="file file-img-preview" accept="image/*">
                <div class="input-group my-3">
                    <input type="text" class="form-control" disabled placeholder="Upload File" id="file">
                    <div class="input-group-append">
                        <button type="button" class="browse btn btn-primary">Browse...</button>
                    </div>
                    
                </div>
                <div class="ml-2 col-sm-6">
                    <img src="https://placehold.it/80x80" id="preview" class="img-thumbnail" style="width:80px;height:80px;">
                </div>
                
            </div>
            
            <button type="submit" id="submitButton" class="btn btn-primary btn-icon-split">
                <span class="icon text-white-50">
                    <i class="fas fa-check"></i>
                </span>
                <span class="text">Save</span>
            </button>
        </form>
    </div>
</div>
</div>
@endsection
@push('scripts')
<script>
    (function() {
        'use strict';
        window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('create-teacher');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
    })();

    $(document).on("click", ".browse", function() {
        var file = $(this).parents().find(".file");
        file.trigger("click");
    });
    $('input[type="file"]').change(function(e) {
        var fileName = e.target.files[0].name;
        $("#file").val(fileName);

        var reader = new FileReader();
        reader.onload = function(e) {
                // get loaded data and render thumbnail.
                document.getElementById("preview").src = e.target.result;
            };
            // read the image file as a data URL.
            reader.readAsDataURL(this.files[0]);
        });
    </script>
    <script>
        $('#type').on('change', function (e) {
            var type = $(this).val();
if(type!=null&&type=='student'){
    $(".classes").removeClass("d-none");
    $(".sections").removeClass("d-none");

}
            
            
$('#class').on('change', function (e) {
            var classes = $(this).val();
if(classes!=null){
    $('#section').html()

  $.ajax({
      url:'getsection/'+classes,
      type:'GET',
      success:function(data){
          console.log(data)
              $('#section').append(data)
      }
  })  
}         
        });
    });

    </script>
       <script>
        $(document).ready(function() {
          $('#summernote').summernote({
              placeholder: 'Page Content Here',
              tabsize: 2,
              height: 300,
              callbacks: {
                  onImageUpload: function(files) {
                      that = $(this);
                      sendFile(files[0], that);
                  }
              }
          });
      });
</script>
    @endpush