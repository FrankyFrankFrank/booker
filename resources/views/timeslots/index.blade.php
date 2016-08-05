@extends('layouts.app')

@section('content')

  <div class="container">
    <div class="row">
      <div class="col-md-12">

        @if (Auth::user()->role == 'agent')

          <h2>Booked Timeslots</h2>

          @foreach ($unavailableTimeslotsByDay as $day => $timeslots)
            <div class="timeslot-day-row row">

              <h3 data-target="#booked-day-{{ date('lFj', strtotime($day)) }}"" data-toggle="collapse">{{ date('l, F j', strtotime($day)) }}</h3>
              <div id="booked-day-{{ date('lFj', strtotime($day)) }}" class="collapse in">

              @foreach($timeslots as $timeslot)

                @include('timeslots.timeslot')

              @endforeach
              </div>

            </div>
          @endforeach
          <hr>
        @endif

        <h1>Available Time Slots</h1>
        @if (Auth::user()->role == 'agent')
          <a href="/timeslots/create" class="btn btn-primary"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>&nbsp;&nbsp;Create New Timeslot</a>
        @endif
        <br>

        @forelse ($availableTimeslotsByDay as $day => $timeslots)
          <div class="timeslot-day-row row">

            <h3 data-toggle="collapse" data-target="#available-day-{{ date('lFj', strtotime($day)) }}">{{ date('l, F j', strtotime($day)) }}</h3>
            <div id="available-day-{{ date('lFj', strtotime($day)) }}" class="collapse in">
            @foreach($timeslots as $timeslot)

              @include('timeslots.timeslot')

            @endforeach
          </div>
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
