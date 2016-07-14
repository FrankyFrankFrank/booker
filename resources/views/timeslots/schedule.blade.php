@extends('layouts.app')

@section('content')

  <div class="container">
    <div class="row">
      @foreach($scheduled as $timeslot)
      <div class="col-md-12">
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
      </div>
      @endforeach
    </div>
  </div>

@endsection
