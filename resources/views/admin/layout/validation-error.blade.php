

@push('scripts')
@if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
            <script>
                toastr.error("{{$error}}");
            </script>
            @endforeach
        </ul>
@endif
@endpush

