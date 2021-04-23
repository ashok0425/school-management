@extends('admin.school.dashboard')
@section('dashboard-body')
<!-- Page Heading -->

<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 m-auto">
		<div class="card shadow mb-4">
			<div class="card-header py-3 d-flex justify-content-between">
				<h6 class="m-0 font-weight-bold text-primary pt-2">Routine List</h6>
				<a href="{{__setLink('school/routine/list')}}"  class="btn btn-primary pull-right float-right">
					<i class="pr-2"></i>Routine List</a>
				</div>
				<style>
					div.card-body {
							  overflow-x: scroll;
							}
				</style>
				<div class="card-body">

					<form action="{{__setLink('school/routine/add')}}" method="post">
						{{csrf_field()}}

					<div class="row">
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
			<div class="table mt-5">

				<table class="table table-bordered"  width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>period 1</th>
							<th>period 2</th>
							<th>period 3</th>
							<th>period 4</th>
							<th>period 5</th>
							<th>period 6</th>
							<th>period 7</th>
							<th>period 8</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							@include('admin.school.routine.dropdown')
							@include('admin.school.routine.dropdown')
							@include('admin.school.routine.dropdown')
							@include('admin.school.routine.dropdown')
							@include('admin.school.routine.dropdown')
							@include('admin.school.routine.dropdown')
							@include('admin.school.routine.dropdown')
							@include('admin.school.routine.dropdown')
						</tr>

</tbody>
</table>
</div>
<input type="submit" class="btn btn-primary" value="Create Routine">
</div>
</form>

</div>
</div>

</div>
@stop

@include('admin.school.routine.parts.add-section-by-class')
