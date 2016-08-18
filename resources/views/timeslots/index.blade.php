@extends('layouts.app')

@section('content')

  <div class="container">
    <div class="row">
      <div class="col-md-12">

        @if (auth()->user()->hasRole('Agent'))

          <h2>Booked Timeslots</h2>

          @foreach ($unavailableTimeslotsByDay as $day => $timeslots)
            <div class="timeslot-day-row row">

              <h3>{{ date('l, F j', strtotime($day)) }}</h3>

              @foreach($timeslots as $timeslot)

                @include('timeslots.timeslot')

              @endforeach

            </div>
          @endforeach
          <hr>
        @endif

        <h1>Available Time Slots</h1>
        @if (auth()->user()->hasRole('Agent'))
          <div>
            <a href="/timeslots/create" class="btn btn-primary"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>&nbsp;&nbsp;Create New Timeslot</a>
          </div>
        @endif
        <br>

        @forelse ($availableTimeslotsByDay as $day => $timeslots)
          <div class="timeslot-day-row row">

            <h3>{{ date('l, F j', strtotime($day)) }}</h3>

            @foreach($timeslots as $timeslot)

              @include('timeslots.timeslot')

            @endforeach
          </div>
        @empty
          <div class="row">
            <div class="col-md-12">
              <div class="alert alert-info">
                @if(Auth::user()->role == 'agent')All @else We're sorry. All @endif timeslots are currently booked.
                </div>
              </div>
            </div>
          @endforelse




        </div>
      </div>
    </div>

  @endsection
