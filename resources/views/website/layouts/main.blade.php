<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <title>Lyceex</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="fonts/fontawesome-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
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
    @include('website.layouts.header')
        @yield('page')
    @include('website.layouts.footer')
<script src="bootstrap/js/jquery.js"></script>
<script src="js/popper.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="js/jquery.slicknav.min.js"></script>

<script src="js/navbar.js"></script>

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