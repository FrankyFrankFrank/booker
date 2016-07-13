@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h1>Success!</h1>
      <div class="alert alert-info">
        <p>Your VIP Appointment has been booked.<br>
        <strong>Please note this information below.</strong></p>
      </div>
      <hr>
      <h2>Your Appointment:</h2>
      @foreach( auth()->user()->visiting->all() as $timeslot )
      <dl>
        <dt>Agent:</dt>
        <dd>{{ $timeslot->agent->name }}</dd>
        <dt>Time:</dt>
        <dd>{{ $timeslot->time }}</dd>
        <dt>Agent Email:</dt>
        <dd>{{ $timeslot->agent->email }}</dd>
      </dl>
      @endforeach
      <hr>
      <h3>Things to Remember:</h3>
      <dl>
        <dt>Arrive 10 Min Prior</dt>
        <dd>Please arrive ten minutes before your appointment.</dd>
        <dt>Appointments are One Hour</dt>
        <dd>We want to ensure that we accomodate everyone who has booked an appointment. Appointments are one hour long and we will do our best to keep this schedule.</dd>
        <dt>Lots are Being Reserved</dt>
        <dd>Please keep in mind that lot reservations are first-come-first-serve. We will be taking reservations throughout the day and it is possible your desired lot will be reserved before your appointment.</dd>
      </dl>
      <hr>
      <a href="{{ url('/') }}" class="btn btn-primary">Finish</a>
    </div>
  </div>
</div>

@endsection
