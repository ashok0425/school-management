<!DOCTYPE html>
<html>
  <head>
    <title>Welcome Email</title>
  </head>
  <body>
    <h2>Welcome to the site {{$school['name']}}</h2>
    <br/>
        Your registered email-id is {{$school['email']}} , Please click on the below link to verify your email account
    <br/>
    <a href="{{url('/school/verify', $school->verifySchool->token)}}">Verify Email</a>
  </body>
</html>