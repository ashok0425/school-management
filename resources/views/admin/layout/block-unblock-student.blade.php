@push('scripts')
<script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('.switch input[type="checkbox"]').on('change',function(e){
                control = this;
                e.preventDefault();
                bootbox.confirm('Do you really want to block student?', function (res) {
                  if (res){
                    let user_id = $(control).attr('user_id');
                    let status  = $(control).prop('checked');
                    console.log(status);
                    console.log(user_id);

                        $.ajax({
                            url: `{{route('school.toogle.status.student')}}`,
                            type: 'POST',
                            data: {
                                status: status,
                                id: user_id,
                            },
                            success: function(response) {
                                bootbox.alert(`${response.message}`)
                            },
                            error: function(error) {
                                 bootbox.alert(`${error}`)
                            }

                        });
                    }
            });

            });

        });
    </script>
@endpush