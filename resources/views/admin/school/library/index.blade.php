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
                <div class="card-header py-3 d-flex justify-content-between ">
                    <h6 class="m-0 font-weight-bold text-primary pt-2">Library Books Status</h6>
                    <div class="float-right">
                        <a href="{{__setLink('school/category/add')}}" class="btn btn-primary pull-right mr-2">
                            <i class="fas fa-book pr-2"></i>  Add Category
                        </a>
                        <a href="{{__setLink('school/books')}}" class="btn btn-primary pull-right mr-2">
                            <i class="fas fa-book-medical pr-2"></i> Add Books
                        </a>
                        <a href="{{__setLink('school/assignbooks')}}" class="btn btn-primary pull-right float-right">
                            <i class="fas fa-book-reader pr-2"></i>Assign Books
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>S.N</th>
                                <th>Category Name</th>
                                <th>Book Name</th>
                                <th>Book Author</th>
                                <th>Book ISBN</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($books as $key => $books)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $books->category->title }}</td>
                                    <td>{{ $books->book_title}}</td>
                                    <td>{{ $books->book_author }}</td>
                                    <td>{{ $books->book_isbn }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan=5 >No Record Available</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop