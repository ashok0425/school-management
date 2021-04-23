
@extends('mail.layout.master')

@section('mail-content')
    <h1 style=" margin: 0;   box-sizing: border-box;width:100%;background:#5d83cc;padding:20px;color:#fff;text-align:left">Welcome {{$school['name']}}</h1>
    <div style="padding-left: 10px;padding-right: 10px;">
      <div style="    display: inline-block;      padding: 10px;">
        <br/>
        Your registered email-id is {{$school['email']}} , Please click on the below link to verify your email account
    <br/>
    <a href="{{url('/school/verify', $school->verifySchool->token)}}">Verify Email</a>
@endsection
       

    

