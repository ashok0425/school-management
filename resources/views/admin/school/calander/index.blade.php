@extends('admin.school.dashboard')
@section('dashboard-body')
    @push('links')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>
        <style>
            a:not([href]) {
                color: white !important;
                text-decoration: none;
            }
        </style>
    @endpush
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 m-auto">
        @if(Session::has('success'))
            toastr.success("{{ Session::get('success') }}");
        @endif
        @if(Session::has('error'))
            toastr.warning("{{ Session::get('error') }}");
        @endif
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary pt-2"> Event Calender</h6>
        </div>
        <div class="container mt-2">
            <div class="panel panel-primary">
                <div class="panel-body">
                    <form action="{{route('school.calendar.add')}}" method="post">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                @if (Session::has('success'))
                                    <div class="alert alert-success">{{ Session::get('success') }}</div>
                                @elseif (Session::has('warnning'))
                                    <div class="alert alert-danger">{{ Session::get('warnning') }}</div>
                                @endif
                            </div>
                            <div class="col-xs-4 col-sm-4 col-md-4">
                                <div class="form-group">
                                    <label for="">Event Name:</label>
                                    <div class="">
                                        <input type="text" name="event_name" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-3 col-sm-3 col-md-3">
                                <div class="form-group">
                                    <label for="">Start Date</label>
                                    <div class="">
                                        <input type="date" class="form-control" name="start_date">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-3 col-sm-3 col-md-3">
                                <div class="form-group">
                                    <label for="">End Date</label>
                                    <div class="">
                                        <input type="date" class="form-control" name="end_date">
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4">
                                <button type="submit" class="btn btn-primary"> Add Event</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="panel panel-primary">
                <div class="panel-heading">MY Event Details</div>
                <div class="panel-body">
                    {!! $calendar_details->calendar() !!}
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        <!-- Scripts -->
        <script src="http://code.jquery.com/jquery.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
        {!! $calendar_details->script() !!}
    @endpush
@stop