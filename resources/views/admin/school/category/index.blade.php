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
            <div id="message"></div>
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary pt-2">Library Books Status</h6>
                    <a href="{{route('school.student.create')}}" class="btn btn-primary pull-right float-right"
                       data-toggle="modal" data-target="#myModal">
                        Add Category
                    </a>
                </div>
                <div class="card-body">
                    <div class="table">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>SN</th>
                                <th>Title</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($categories as $key => $category)
                                <tr>
                                    <td>{{ ++$key}}</td>
                                    <td>{{$category->title}}</td>
                                    <td style="display: flex">
                                        <a href="#" id="js-selector" data-body="{{ $category->title }}" data-id="{{ $category->id }}" data-toggle="modal" data-target="#editModal" class="btn btn-primary btn-circle mr-1 js-click">
                                            <i class="fas fa-user-edit"></i>
                                        </a>
                                        <a href="#" data-toggle="modal" data-target="#deleteModal" class="btn btn-danger btn-circle">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <th>
                                <td>No data available</td>
                                </th>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Categories</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <form action="{{route('school.category.save')}}" method="post">
                            {{ csrf_field() }}
                            <input type="text" class="form-control" name="title" placeholder="Category Name"
                                   required="true" value="">
                            <div class="modal-button">
                                <button type="submit" id="submitButton" class="btn btn-primary btn-icon-split">
                                    <span class="icon text-white-50">
                                    <i class="fas fa-check"></i>
                                    </span>
                                    <span class="text">Save</span>
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

    <!-- Edit Modal -->
    <div id="editModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Categories</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form action="" id="js-update">
                        <div class="form-group">
                            <input type="text" class="form-control" name="title" placeholder="Category Name"
                                   required="true" id="js-title">
                            <div class="modal-button">
                                <button type="submit" id="submitButton" class="btn btn-primary btn-icon-split">
                                    <span class="icon text-white-50">
                                    <i class="fas fa-check"></i>
                                    </span>
                                    <span class="text">Update</span>
                                </button>
                            </div>
                        </div>
                        <input type="hidden" name="id" id="js-id">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Delete Modal-->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Delete </h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Are you sure you want to delete this ?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <form id="js-delete">
                        <button type="submit" class="btn btn-primary">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
@push('scripts')
    <script>
        $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
        $(document).ready(function () {
            $(".js-click").click(function () {
                let dataBody = $(this).attr('data-body');
                let dataId = $(this).attr('data-id');
                $("#js-title").val(dataBody);
                $("#js-id").val(dataId);
            });
            //Update
            $('body').on('submit', '#js-update', (e) => {
                e.preventDefault();
                let id = $("#js-id").attr('value');
                $.ajax({
                    url: '/school/category/update/' + id,
                    data: $('#js-update').serialize(),
                    type: 'PATCH',
                    success: function (data) {
                        $('#message').html('<div id="toast-container" class="toast-top-right"><div class="toast toast-success" aria-live="polite" > <div class="toast-message">Updated Successfully.</div> </div> </div>');
                        // Diplay message with a fadeout
                        $('#toast-container').fadeOut(3000, function () {
                            $('#alertFadeOut').text('');
                        });
                        $('#editModal').modal('hide');
                        setInterval(function () {
                            window.location.reload();
                        }, 700);
                    }
                });
            });
            //Delete
            $('body').on('submit', '#js-delete', (e) => {
                e.preventDefault();
                let id = $("#js-selector").attr('data-id');
                $.ajax({
                    url: '/school/category/delete/' + id,
                    data: $('#js-update').serialize(),
                    type: 'DELETE',
                    success: function (data) {
                        $('#message').html('<div id="toast-container" class="toast-top-right"><div class="toast toast-success" aria-live="polite" > <div class="toast-message">Deleted Successfully.</div> </div> </div>');
                        // Diplay message with a fadeout
                        $('#toast-container').fadeOut(4000, function () {
                            $('#alertFadeOut').text('');
                        });
                        $('#deleteModal').modal('hide');
                        setInterval(function () {
                            window.location.reload();
                        }, 700);
                    }
                });
            });
        });
    </script>
@endpush