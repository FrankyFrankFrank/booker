@extends('layouts.app')

@section('content')

  <div class="container">
    <div class="row">
      <div class="col-md-12">

        <div class="row">
          <div class="col-md-12">
            <nav class="navbar">
            <h1 class="navbar-text">Available Time Slots</h1>
            @if (Auth::user()->role == 'agent')
              <a href="/timeslots/create" class="btn navbar-btn btn-primary navbar-right btn-create">Create New Timeslot</a>
            @endif
          </nav>
          </div>
        </div>
        <br>

        <div class="row">
          @if(!empty($availableTimeslots->all()))
            @foreach ($availableTimeslots as $timeslot)

              <a href="{{ url('/timeslots', [$timeslot->id] )}}">
                <div class="col-md-4">
                  <div class="timeslot">
                    <h1>
                      {{ $timeslot->time }}
                    </h1>
                    <p>1 Hour</p>
                    <p>{{ $timeslot->agent->name }}</p>
                  </div>
                </div>
              </a>

            @endforeach
          @else
            <div class="col-md-12">
              <h3>@if(Auth::user()->role == 'agent')All @else We're Sorry, all @endif timeslots are currently booked.</h3>
            </div>
          @endif
        </div>


        @if (Auth::user()->role == 'agent')

          <hr>
          <h2>Booked Timeslots</h2>

          <div class="row">
            @foreach ($unavailableTimeslots as $timeslot)

              <a href="{{ url('/timeslots', [$timeslot->id] )}}">
                <div class="col-md-4">
                  <div class="timeslot timeslot-booked">
                    <h1>
                      {{ $timeslot->time }}
                    </h1>
                    <p>{{ $timeslot->agent->name }} with: <br>
                      {{ $timeslot->visitor->name }}<br>
                      {{ $timeslot->visitor->email }}
                    </p>
                  </div>
                </div>
              </a>

            @endforeach
          </div>



        @endif

      </div>
    </div>
  </div>

@endsection
