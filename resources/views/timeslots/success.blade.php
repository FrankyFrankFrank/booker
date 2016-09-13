@extends('layouts.app')

@section('content')

<h1>Success!</h1>

<div class="alert alert-warning">
  <p>Your <strong>Priority Preview Event Appointment</strong> has been booked.<br>
    <strong>Please note this information below.</strong>
  </p>
</div>

<hr>

@include('timeslots.timeslotdetails')

<a href="{{ url('/') }}" class="btn btn-primary pull-right">Finish</a>


@endsection
