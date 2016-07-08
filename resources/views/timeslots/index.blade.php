@extends('app')

@section('content')
  <h1>Available Timeslots</h1>

  @foreach ($timeslots as $timeslot)

    @if ($timeslot->is_assigned == 0)

      <div class="row timeslot">
        <div class="col-md-12">
          <h1>
            <a href="{{ url('/timeslots', [$timeslot->id] )}}">{{ $timeslot->time }}</a>
          </h1>
          <p>{{ $timeslot->agent }}</p>
        </div>
      </div>

    @endif

  @endforeach

  <hr>

  <h2>Booked Timeslots</h2>

  @foreach ($timeslots as $timeslot)

    @if ($timeslot->is_assigned == 1)

      <div class="row timeslot booked">
        <div class="col-md-12">
          <h1>
            <a href="{{ url('/timeslots', [$timeslot->id] )}}">{{ $timeslot->time }}</a>
          </h1>
          <p>{{ $timeslot->agent }}</p>
        </div>
      </div>

    @endif

  @endforeach

@endsection
