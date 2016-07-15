@extends('layouts.app')

@section('content')

  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h1>Timeslot Info</h1>
      </div>
    </div>
    <div class="row">
      <div class="col-md-4">
        <div class="timeslot @if (!empty($timeslot->visitor_id)) timeslot-booked @endif">
          <h1>
            <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
            {{ date("D, M j", strtotime($timeslot->date)) }}
            {{ date("g:i a", strtotime($timeslot->time)) }}
          </h1>
          <p>
            <span class="glyphicon glyphicon-time" aria-hidden="true"></span> 1 Hour
          </p>
          <p>
            {{ $timeslot->agent->name }}

          @if (empty($timeslot->visitor_id) && auth()->user()->role == 'visitor')
          </p>

          {!! Form::open(['route' => ['assign', $timeslot->id], 'method' => 'patch']) !!}
          {!! Form::submit('Book This Time Slot Now', ['class' => 'btn btn-primary']) !!}
          {!! Form::close() !!}

          @elseif (!empty($timeslot->visitor_id) && auth()->user()->role == 'agent')

            with:
            <br>
            <strong>
              {{ $timeslot->visitor->name }}
            </strong>
            <br>
            {{ $timeslot->visitor->email }}
          </p>

          @endif

          @if (auth()->user()->role == 'agent')
            {!! Form::open(['route' => ['timeslots.destroy', $timeslot->id], 'method' => 'delete']) !!}
            {!! Form::submit('Delete This Booking (Can\'t Undo)', ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
          @endif
      </div>
    </div>
  </div>
</div>

@endsection
