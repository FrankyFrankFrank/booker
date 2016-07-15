@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <h2 class="text-center welcome-message">Book your Eby Estates Model Home VIP Appointment</h2>
        <p class="text-center">Registration is quick and easy, booking takes seconds!</p>
      </div>
    </div>
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <div class="welcome-buttons">
        @if (Auth::user())
          <p class="text-center">
            <a class="btn btn-primary" href="/timeslots">View Time Slots</a>
          </p>
        @else
          <p class="text-center">
            You Must be Registered to Book an Appointment.
          </p>
          <p class="text-center">
            <a class="btn btn-primary" href="/login">Log In and Book</a>
            OR
            <a class="btn btn-primary" href="/register">Register</a>
          </p>
        @endif
      </div>
      </div>
    </div>

  @endsection
