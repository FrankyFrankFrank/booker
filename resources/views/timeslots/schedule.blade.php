@extends('layouts.app')

@section('content')

<div class="row">
  <div class="col-md-12">
    <h1>Your Appointment Schedule</h1>
  </div>
  @foreach($upcoming as $timeslot)

    @include('timeslots.timeslot')

  @endforeach
</div>
<div class="row">
  <div class="col-md-12">
    <h3>Past Appointments</h3>
  </div>
    @foreach($past as $timeslot)

      @include('timeslots.timeslot')

    @endforeach
</div>

@endsection
