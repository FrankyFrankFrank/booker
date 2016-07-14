@extends('layouts.app')

@section('content')

  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h1>Your Appointment Schedule</h1>
      </div>
      @foreach($scheduled as $timeslot)
        <a href="{{ url('/timeslots', [$timeslot->id] )}}">
          <div class="col-md-4">
            <div class="timeslot timeslot-booked">
              <h1>
                {{ date("g:i a", strtotime($timeslot->time)) }}
              </h1>
              <p>
                With {{ $timeslot->visitor->name }}<br>
                {{ $timeslot->visitor->email }}
              </p>
            </div>
          </div>
        </a>
      @endforeach
    </div>
  </div>

@endsection
