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
          <p class="text-center">
            @if (auth()->user() && auth()->user()->visiting()->first() != NULL)
              <a class="btn btn-primary" href="/timeslots">View Your Appointment</a>
            @elseif(auth()->user())
              <a class="btn btn-primary" href="/timeslots">View Time Slots</a>
            @else
              You Must be Registered to Book an Appointment.<br />
              <a class="btn btn-primary" href="/login">Log In and Book</a>
              OR
              <a class="btn btn-primary" href="/register">Register</a>
            @endif
          </p>
        </div>
      </div>
    </div>

  @endsection
