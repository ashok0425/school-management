@extends('admin.school.dashboard')
@section('dashboard-body')
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        @include('admin.layout.validation-error')
        <div class="card shadow mb-4">
            {!! Form::open(['method'=>'POST','route'=>['school.assignstudent.store'],'role'=>'form','enctype' => 'multipart/form-data']) !!}
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Assign Student Username and Password</h6>
                <div class="float-right">
                    <button type="submit" class="btn btn-primary pull-right">Save</button>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered text-center">
                    <thead>
                    <tr>
                        <th scope="col">SN</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Password</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($students as $key => $student)
                        <tr>
                            <th>{{++$key}} <input type="hidden" name="id[]" value="{{$student->id}}"></th>
                            <th>{{$student->name}}</th>
                            <td>{{$student->email}}</td>
                            <td>{!! Form::text('password[]',$value=null,['class'=>"form-control",'required'=>'required']) !!}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        let i = 2;

        function addRow(ctrl) {
            let trow = '<tr>\n' +
                '                        <th>1</th>\n' +
                '                        <td><input class="form-control" required="required" name="username[]" type="text"></td>\n' +
                '                        <td><input class="form-control" required="required" name="password[]" type="text"></td>\n' +
                '                        <td><i class="fas fa-plus-circle text-success" onclick="addRow(this)"></i> <i class="fas fa-minus-circle text-danger" onclick="deleteRow(this)"></i></td>\n' +
                '                    </tr>';
            $('tbody').append(trow);
        }

        function deleteRow(ctrl) {
            $(ctrl).parent().parent().remove();
        }
    </script>
@endpush