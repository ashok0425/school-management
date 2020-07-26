@extends('admin.admin.dashboard')
@section('admin-dashboard-body')
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            
           @include('admin.layout.validation-error')
           
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Create Page</h6>
                </div>
                <div class="card-body">
                    <form method="post" action="{{Request::segment(3)=='edit'?route('admin.page.update',['page'=>Request::segment(4)]):route('admin.page.save')}}" class="class" novalidate enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="level">Page</label>
                            <input type="text" class="form-control"  name="page" placeholder="Eneter Page Title" required="true" value="{{Request::segment(3)=='edit'?$page->page:old('page')}}">
                            <div class="invalid-feedback">
                                Please provide a Page.
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="level"> Content</label>
                            <textarea id="summernote" name="content" required></textarea>
                            <div class="invalid-feedback">
                                Please provide a Page Content.
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
                var forms = document.getElementsByClassName('class');
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
   
    <script>
       
        function sendFile(file, that) {
            data = new FormData();
            data.append("file", file);
            data.append("_token","{{csrf_token()}}");
            $.ajax({
                data: data,
                type: "POST",
                url: "{{route('admin.page.image.upoad')}}",
                cache: false,
                contentType: false,
                processData: false,
                success: function(url) {
                    $(that).summernote('insertImage',url);
                }
            });
        }

        
  </script>
  @if(isset($page))
<script>

    var content = `<?php echo $page->content;?>`;
   $("#summernote").summernote('code',content,{
    height: 300,
   });
</script>
@endif
@endpush