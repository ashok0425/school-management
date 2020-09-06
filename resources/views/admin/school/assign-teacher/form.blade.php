@extends('admin.school.dashboard')
@section('dashboard-body')
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        @include('admin.layout.validation-error')
        <div class="card shadow mb-4">
            {!! Form::open(['method'=>'POST','route'=>['school.assignteacher.store'],'role'=>'form','enctype' => 'multipart/form-data']) !!}
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Create Teacher</h6>
                <div class="float-right">
                    <button type="submit" class="btn btn-primary pull-right">Save</button>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered text-center">
                    <thead>
                    <tr>
                        <th scope="col">SN</th>
                        <th scope="col">Email</th>
                        <th scope="col">Password</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($teachers as $key => $teacher)
                        <tr>
                            <th>{{++$key}}<input type="hidden" value="{{$teacher->id}}" name="id[]"></th>
                            <th>{{$teacher->email}}</th>
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

@endpush