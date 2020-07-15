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
    <link href="css/animate.min.css">
    <link rel="stylesheet" href="css/slicknav.css">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/index.css">
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



</body>
</html>