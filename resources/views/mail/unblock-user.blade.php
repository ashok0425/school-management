@extends('mail.layout.master')

@section('mail-content')
 <div class="body_ground">
     
      <h1>Dear {{$name}}</h1>
      <div class="top_1">
         <p> Your email-id  {{$email}} , is {{ $status == 1 ? 'blocked' : 'unblocked' }} by admin.</p>
      </div>
     
      <div class="top_2">
        <p>Please contact administrator for further details</p>
      </div>
      <div class="team_msg">
        <p>The AB Group Team</p>
      </div>
@endsection