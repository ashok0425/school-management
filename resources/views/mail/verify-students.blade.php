<!DOCTYPE html>
<html>
  <head>
    <title>Welcome Email</title>
  </head>
  <body>
    <br/>
        Your registered email-id is {{$student->email}} , Please click on the below link to verify your email account
    <br/>
    <a href="{{url('school/verify/students', $student->remember_token)}}">Verify Email</a>
  </body>
</html>