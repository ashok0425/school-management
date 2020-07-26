<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <title>Lyceex</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{asset('bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('fonts/fontawesome-icons.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <!-- <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/contacts.css">
   
    <link rel="stylesheet" href="css/plans.css">
    <link rel="stylesheet" href="css/service.css">
    <link rel="stylesheet" href="css/spacinghelper.css">
    <link rel="stylesheet" href="css/terms.css">
    <link rel="stylesheet" href="css/faq.css"> -->
    <!--page css -->



</head>
<body >
    @include('admin.layout.message')
    @include('website.layouts.header')
        @yield('page')
    @include('website.layouts.footer')
<script src="{{asset('bootstrap/js/jquery.js')}}"></script>
<script src="{{asset('js/popper.min.js')}}"></script>
<script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/jquery.slicknav.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
` <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

<script src="{{asset('js/navbar.js')}}"></script>

<script>
    $("#accordion").on("hide.bs.collapse show.bs.collapse", e => {
        $(e.target)
            .prev()
            .find("i:last-child")
            .toggleClass("fa-minus fa-plus");
    });

</script>
@stack('scripts')


</body>
</html>