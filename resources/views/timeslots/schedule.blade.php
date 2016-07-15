@extends('layouts.app')

@section('content')

  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h1>Your Appointment Schedule</h1>
      </div>
      @foreach($scheduled as $timeslot)

        @include('timeslots.timeslot')

      @endforeach
    </div>
  </div>

@endsection
