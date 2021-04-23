<!DOCTYPE html>
<html>
  <head>
    <title>Status Email</title>
  </head>
  <body>
    <br/>
        Your email-id  {{$student['email']}} , is {{ $student['status'] == 1 ? 'blocked' : 'unblocked' }} by admin.
    <br/>
  </body>
</html>