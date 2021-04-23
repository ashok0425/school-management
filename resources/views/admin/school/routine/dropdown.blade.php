<td>
		<div class="col">
		 <select name="subject_id[]" class="custom-select">
			<option selected>Select Subject:</option>
			@foreach($subjects as $subject)
				<option value="{{$subject->id}}">{{$subject->subject}}</option>
			@endforeach
		</select>
	</div>
	<br>           
	<div class="col">
	 <select name="teacher_id[]" class="custom-select">
		<option selected>Select Staff:</option>
		@foreach($teachers as $teacher)
		<option value="{{$teacher->id}}">{{$teacher->name}}</option>
		@endforeach
	</select>
</div>
</td>