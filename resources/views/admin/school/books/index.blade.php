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
                    <a href="#" class="btn btn-primary pull-right float-right"
                       data-toggle="modal" data-target="#myModal">
                        Add Books
                    </a>
                </div>
                <div class="card-body">
                    <div class="table">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>SN</th>
                                <th>Book Title</th>
                                <th>Book Author</th>
                                <th>Book ISBN</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($books as $key => $book)
                                <tr>
                                    <td>{{ ++$key}}</td>
                                    <td>{{ $book->book_title }}</td>
                                    <td>{{ $book->book_author }}</td>
                                    <td>{{ $book->book_isbn }}</td>
                                    <td style="display: flex">
                                        <a
                                                href="#"
                                                id="js-selector" data-title="{{ $book->book_title }}"
                                                data-category="{{ $book->category->id }}"
                                                data-author="{{ $book->book_author }}"
                                                data-isbn="{{ $book->book_isbn }}" data-id="{{ $book->id }}"
                                                data-toggle="modal" data-target="#editModal"
                                                class="btn btn-primary btn-circle mr-1 js-click">
                                            <i class="fas fa-user-edit"></i>
                                        </a>
                                        <a href="#" data-toggle="modal" data-target="#deleteModal"
                                           class="btn btn-danger btn-circle">
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

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Categories</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <form action="{{route('school.books.add')}}" method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="category_id">Select Level:</label>
                                <select class="custom-select" id="category_id" name="category_id" required="true">
                                    <option>----Select Category----</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="book_title">Book Title</label>
                                <input type="text" class="form-control" id="book_title" name="book_title"
                                       placeholder="Book Title" required="true">
                            </div>

                            <div class="form-group">
                                <label for="book_author">Book Author</label>
                                <input type="text" class="form-control" id="book_author" name="book_author"
                                       placeholder="Book Author" required="true">
                            </div>

                            <div class="form-group">
                                <label for="book_isbn">Book ISBN NO</label>
                                <input type="number" class="form-control" id="book_isbn" name="book_isbn"
                                       placeholder="Book ISBN NO" required="true">
                            </div>

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
                    <form id="js-update">
                        <div class="form-group">
                            <div class="form-group">
                                <label for="js-categoryId">Select Level:</label>
                                <select class="custom-select" id="js-categoryId" name="category_id" required="true">
                                    <option>----Select Category----</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">
                                            {{ $category->title }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="js-title">Book Title</label>
                                <input type="text" class="form-control" id="js-title" name="book_title"
                                       placeholder="Book Title" required="true">
                            </div>

                            <div class="form-group">
                                <label for="js-author">Book Author</label>
                                <input type="text" class="form-control" id="js-author" name="book_author"
                                       placeholder="Book Author" required="true">
                            </div>

                            <div class="form-group">
                                <label for="js-isbn">Book ISBN NO</label>
                                <input type="number" class="form-control" id="js-isbn" name="book_isbn"
                                       placeholder="Book ISBN NO" required="true">
                            </div>
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
                let dataTitle = $(this).attr('data-title');
                let dataAuthor = $(this).attr('data-author');
                let dataCategory = $(this).attr('data-category');
                let dataIsbn = $(this).attr('data-isbn');
                let dataId = $(this).attr('data-id');
                $("#js-title").val(dataTitle);
                $("#js-author").val(dataAuthor);
                $("#js-isbn").val(dataIsbn);
                $("#js-id").val(dataId);
                $("#js-categoryId").val(dataCategory);
            });
            //Update
            $('body').on('submit', '#js-update', (e) => {
                e.preventDefault();
                let id = $("#js-id").attr('value');
                $.ajax({
                    url: '/school/books/update/' + id,
                    data: $('#js-update').serialize(),
                    type: 'POST',
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
                    url: '/school/books/delete/' + id,
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
