@extends('layouts.app')

@section('content')

  {{-- If User is an agent show create new timeslot --}}
  @if (auth()->user()->hasRole('Agent'))
  <div class="toolbar row">
    <div class="col-md-12">
          <a href="/timeslots/create" class="btn btn-primary"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>&nbsp;&nbsp;Create New Timeslot</a>
    </div>
  </div>
  @endif

  <div class="row">
    <div class="col-md-12">



      <div class="row">
        <div class="col-md-12">
          <h2>Available Time Slots</h2>
        </div>
      </div>

      {{-- List all available timeslots by day if exists --}}
      @forelse ($availableTimeslotsByDay as $day => $timeslots)

      <div class="timeslot-day-row row">

        {{-- Include the timeslots --}}
        @foreach($timeslots->chunk(3) as $timeslotChunk)

          @foreach($timeslotChunk as $timeslot)
            @include('timeslots.timeslot')
          @endforeach

          <div class="clearfix"></div>

        @endforeach

        {{-- Delimits the Date Group --}}
        <div class="datebreaker col-md-12">
        </div>

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

      <br>

      {{-- Show Booked Timeslots If User is Agent or Admin --}}

      {{-- Check User Role --}}
      @if (auth()->user()->hasRole('Agent'))

        <div class="row">
          <div class="col-md-12">
            <h2>Booked Timeslots</h2>
          </div>
        </div>

        {{-- Show unavailable timeslots and group them by day --}}
        @forelse ($unavailableTimeslotsByDay as $day => $timeslots)

        <div class="timeslot-day-row row">

          @foreach($timeslots->chunk(3) as $timeslotChunk)

          {{-- Include the timeslots --}}
          @foreach($timeslotChunk as $timeslot)
            @include('timeslots.timeslot')
          @endforeach

          <div class="clearfix"></div>

          @endforeach

        </div>

        @empty

        @endforelse

      @endif
      {{-- End Show Booked Timeslots --}}

    </div>
  </div>

@endsection
