@extends('layouts.app')

@section('content')

<div class="welcome-buttons">
  <img class="center-block welcome-message" src=" {{ $project->logo }} " />
  <h2 class="text-center">Book your {{ $project->name }} Model Home Appointment</h2>
  <p class="text-center">
  @if (auth()->user() && auth()->user()->visiting()->first() != NULL)
    <a class="btn btn-primary" href="/timeslots">View Your Appointment</a>
  @elseif(auth()->user())
    <a class="btn btn-primary" href="/timeslots">View Time Slots</a>
  @else
    You Must be Registered to Book an Appointment.
    </p>
    <p class="text-center">
      <a class="btn btn-primary" href="/login">Log In and Book</a>
      OR
      <a class="btn btn-primary" href="/register">Register</a>
  @endif
  </p>
</div>

@endsection
