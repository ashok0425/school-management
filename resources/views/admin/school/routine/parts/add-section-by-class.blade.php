@push('scripts')
<script>
	$(document).ready(function(){
		$('#classNameId').change(function(){
			$.ajax({
				type: 'POST',
				url: `{{route('school.getSectionFromClass')}}`,
				data: {
					"class_id" : $(this).val(),
					"_token": "{{ csrf_token()}}",
				},
				success: function(response) {
					$.each(JSON.parse(response), function(index, section){
					$('#sectionOption').append(`<option value="${section.id}">${section.section}</option>`)
					});
				}
			});
		});
	});
</script>

@endpush