@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row">
    <div class="col-md-12">

      {{-- If User is an agent show create new timeslot --}}
      @if (auth()->user()->hasRole('Agent'))
      <div>
        <a href="/timeslots/create" class="btn btn-primary"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>&nbsp;&nbsp;Create New Timeslot</a>
      </div>
      @endif


      {{-- Show Booked Timeslots If User is Agent or Admin --}}

      {{-- Check User Role --}}
      @if (auth()->user()->hasRole('Agent'))



        {{-- Show unavailable timeslots and group them by day --}}
        @forelse ($unavailableTimeslotsByDay as $day => $timeslots)

        <div class="row">
          <div class="col-md-12">
            <h2>Booked Timeslots</h2>
          </div>
        </div>

        <div class="timeslot-day-row row">

          {{-- Show the Date --}}
          <div class=" col-md-12">
            <h3>{{ date('l, F j', strtotime($day)) }}</h3>
          </div>

          {{-- Include the timeslots --}}
          @foreach($timeslots as $timeslot)

          @include('timeslots.timeslot')

          @endforeach

        </div>

        @empty

        @endforelse

      @endif
      {{-- End Show Booked Timeslots --}}

      <br>

      <div class="row">
        <div class="col-md-12">
          <h2>Available Time Slots</h2>
        </div>
      </div>
      

      {{-- List all available timeslots by day if exists --}}
      @forelse ($availableTimeslotsByDay as $day => $timeslots)

      <div class="timeslot-day-row row">

        {{-- Show the Date --}}
        <div class=" col-md-12">
          <h3>{{ date('l, F j', strtotime($day)) }}</h3>
        </div>

        {{-- Include the timeslots --}}
        @foreach($timeslots as $timeslot)

        @include('timeslots.timeslot')

        @endforeach

      </div>

      @empty

      {{-- If no timeslots or if all timeslots are booked --}}
      <div class="row">
        <div class="col-md-12">
          <div class="alert alert-info">
            @if(auth()->user()->hasRole('Agent'))All @else We're sorry. All @endif timeslots are currently booked.
          </div>
        </div>
      </div>

      @endforelse
      {{-- End List all available timeslots by day if exists --}}

    </div>
  </div>
</div>

@endsection
