@extends('layouts.app')

@section('content')

  <div class="container">
    <div class="row">
      <div class="col-md-12">

        <div class="row">
          <div class="col-md-12">
            <h1>Available Timeslots</h1>
            @if ($user->role == 'agent')
              <a href="/timeslots/create" class="btn btn-primary">Create New Timeslot</a>
            @endif
          </div>
        </div>
        <br>

        <div class="row">
          @foreach ($availableTimeslots as $timeslot)

            <a href="{{ url('/timeslots', [$timeslot->id] )}}">
              <div class="col-md-4">
                <div class="timeslot">
                  <h1>
                    {{ $timeslot->time }}
                  </h1>
                  <p>{{ $timeslot->agent }}</p>
                </div>
              </div>
            </a>

          @endforeach
        </div>


        @if ($user->role == 'agent')

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
                    <p>{{ $timeslot->agent }} with: <br>
                      John Doe<br>
                      1-519-555-1048<br>
                      john@example.com
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
