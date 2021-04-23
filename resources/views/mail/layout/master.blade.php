<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

  <title>Email Template</title>
</head>
<body>
  <style type="text/css">
    .header_ground {
    background-color: #539be2;
    height: 233px;
    text-align: center;
}
body{
  background-color: #f4f4f4;
}
.body_ground {
    width:47%;
    background-color: white;
    margin: -93px auto 0;
    padding: 30px;
}
.body_ground_1{
   width:47%;
    margin: 0 auto;
    padding: 30px;
}
.body_ground h1 {
    font-size: 48px;
    font-weight: 400;
    text-transform: capitalize;
    text-align: center;
    margin-bottom: 50px;

}
.top_1 p {
    font-size: 18px;
    color: #777;
}
a.bth-primary {
    background-color: #539be2;
    color: #fff;
    text-decoration: none;
    padding: 10px 15px;
    display: inline-block;
}
.bth_group {
    text-align: center;
    margin-top: 55px;
}
.top_2 p {
    font-size: 18px;
    color: #777;
}
.top_2 {
    margin-top: 55px;
}
.team_msg p {
    color: #777;
        font-size: 18px;

}

.team_msg {
    margin-top: 36px;
}

.hyper_link a {
    color: #000;
    font-size: 14px;
}
.small_text a {
    color: #000;
}

.small_text {
    font-size: 14px;
    margin-top: 25px;
    margin-bottom: 25px;
        color: #777;
}
.contoso p {
    font-size: 14px;
      color: #777;
}
.branding_img {
    height: 74px;
    margin-top: 33px;
}
  </style>
  <div class="header_ground">
    <img class="branding_img" src="http://lyceex.abgroup/images/logo.png" alt="">
  </div>
  @yield('mail-content')
 
  </div> 
  <div class="body_ground_1">
    <div class="hyper_link">
        <a href="">Dashboard</a> - <a href="">Billing</a> - <a href="">Help</a>
      </div>

      <div class="small_text">
        if these emails get annoying. please feel free to <a href="">Unsubscribe</a>
      </div>
      <div class="contoso"><p>contoso-1234 Main Street - Anywhere, MA - 56789</p></div>
  </div> 

</body>
</html>