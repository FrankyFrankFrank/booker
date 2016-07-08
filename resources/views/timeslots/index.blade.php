@extends('app')

@section('content')
  <h1>Available Timeslots</h1>

  @foreach ($availableTimeslots as $timeslot)

      <div class="row timeslot">
        <div class="col-md-12">
          <h1>
            <a href="{{ url('/timeslots', [$timeslot->id] )}}">{{ $timeslot->time }}</a>
          </h1>
          <p>{{ $timeslot->agent }}</p>
        </div>
      </div>

  @endforeach

  <hr>

  <h2>Booked Timeslots</h2>

  @foreach ($unavailableTimeslots as $timeslot)

      <div class="row timeslot booked">
        <div class="col-md-12">
          <h1>
            <a href="{{ url('/timeslots', [$timeslot->id] )}}">{{ $timeslot->time }}</a>
          </h1>
          <p>{{ $timeslot->agent }}</p>
        </div>
      </div>

  @endforeach

@endsection
