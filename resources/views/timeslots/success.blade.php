@extends('layouts.app')

@section('content')

<h1>its' BOOKED!</h1>

<div class="alert alert-warning">
  <p>Your <strong>Priority Preview Event Appointment</strong> has been booked.
    <strong>Please note this information below.</strong>
  </p>
</div>

<hr>

@include('timeslots.timeslotdetails')

<a style="margin-bottom: 60px" href="{{ url('/') }}" class="btn btn-primary pull-right">Finish</a>


@endsection
