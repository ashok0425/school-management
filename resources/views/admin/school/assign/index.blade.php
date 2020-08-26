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

            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary pt-2">Library Books Status</h6>
                    <a href="#" class="btn btn-primary pull-right float-right"
                       data-toggle="modal" data-target="#myModal">
                        Assign Books
                    </a>
                </div>
                <div class="card-body">
                    <div class="table">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>Student Name</th>
                                <th>Student Phone</th>
                                <th>Book Title</th>
                                <th>Book Author</th>
                                <th>Book ISBN</th>
                                <th>Taken Date</th>
                                <th>Returned Date</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($books as $key => $book)
                                <tr>
                                    <td>{{ $book->name }}</td>
                                    <td>{{ $book->phonno }}</td>
                                    <td>{{ $book->book_title }}</td>
                                    <td>{{ $book->book_author }}</td>
                                    <td>{{ $book->book_isbn }}</td>
                                    <td>{{ $book->taken_date }}</td>
                                    <td>
                                        <form style="display: flex"
                                              action="/school/assignbooks/updatedate/{{ $book->id }}" method="post"
                                              onSubmit="return confirm('Are u sure you want to make this change ?')">
                                            {{csrf_field()}}
                                            {{ method_field('PATCH') }}
                                            <p class="text-success text-sm-center mr-2">Not Returned</p>
                                            <label class="switch">
                                                <input type="checkbox"
                                                       {{ $book->returned_date != NULL ? 'checked' : ''}}  onChange="this.form.submit()"
                                                       name="status">
                                                <span class="slider round"></span>
                                            </label>
                                            <p class="text-success text-sm-center ml-2">Returned</p>
                                        </form>
                                        Received Date : {{ $book->returned_date }}
                                    </td>
                                    <td style="display: flex">
{{--                                        <a--}}
{{--                                                href="#"--}}
{{--                                                class="btn btn-primary btn-circle mr-1">--}}
{{--                                            <i class="fas fa-user-edit"></i>--}}
{{--                                        </a>--}}
                                        <form action="/school/assignbooks/delete/{{ $book->id }}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button
                                                    onclick="return confirm('Delete entry?')"
                                                    class="btn btn-danger btn-circle">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
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
                        <form action="{{route('school.assignbooks.add')}}" method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="book_id">Select Books:</label>
                                <select class="custom-select" id="book_id" name="book_id" required="true">
                                    <option>----Select Books----</option>
                                    @foreach($bookslists as $book)
                                        <option value="{{ $book->id }}">{{ $book->book_title }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="student_id">Select Student:</label>
                                <select class="custom-select" id="student_id" name="student_id" required="true">
                                    <option>----Select Books----</option>
                                    @foreach($students as $student)
                                        <option value="{{ $student->id }}">{{ $student->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="modal-button">
                                <button type="submit" id="submitButton" class="btn btn-primary btn-icon-split">
                                    <span class="icon text-white-50">
                                    <i class="fas fa-check"></i>
                                    </span>
                                    <span class="text">Assign Books</span>
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