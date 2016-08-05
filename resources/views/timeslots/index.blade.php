@extends('layouts.app')

@section('content')

  <div class="container">
    <div class="row">
      <div class="col-md-12">

        <div class="row">
          <div class="col-md-12">
            <h1>Available Time Slots</h1>
            @if (Auth::user()->role == 'agent')
              <a href="/timeslots/create" class="btn btn-primary"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>&nbsp;&nbsp;Create New Timeslot</a>
            @endif
          </div>
        </div>

        <br>

        @forelse ($availableTimeslotsByDay as $day => $timeslots)
          <div class="row">

            <div class="col-md-12">
              <h3>{{ date('l, F j', strtotime($day)) }}</h3>
            </div>

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


          @if (Auth::user()->role == 'agent')

            <hr>
            <h2>Booked Timeslots</h2>

            @foreach ($availableTimeslotsByDay as $day => $timeslots)
              <div class="row">
                <div class="col-md-12">
                  <h3>{{ date('l, F j', strtotime($day)) }}</h3>
                </div>
                @foreach($timeslots as $timeslot)

                  @include('timeslots.timeslot')

                @endforeach

              </div>
            @endforeach

          @endif

        </div>
      </div>
    </div>

  @endsection
