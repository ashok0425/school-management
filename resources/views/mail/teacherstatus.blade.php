<!DOCTYPE html>
<html>
  <head>
    <title>Status Email</title>
  </head>
  <body>
    <br/>
        Your email-id  {{$teacher['email']}} , is {{ $teacher['status'] == 1 ? 'blocked' : 'unblocked' }} by admin.
    <br/>
  </body>
</html>