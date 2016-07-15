@extends('layouts.app')

@section('content')

  <div class="container">
    <div class="row">

      <div class="col-md-12">
        <div class="timeslot @if (!empty($timeslot->visitor_id)) timeslot-booked @endif">
          <div class="row">
            <div class="col-md-6">
              <h1>{{ date("D, M d", strtotime($timeslot->date)) }} {{ date("g:i a", strtotime($timeslot->time)) }}</h1>
              <p>{{ $timeslot->agent->name }}

                @if (empty($timeslot->visitor_id) && auth()->user()->role == 'visitor')
                </p>

                {!! Form::open(['route' => ['assign', $timeslot->id], 'method' => 'patch']) !!}
                {!! Form::submit('Book This Time Slot Now', ['class' => 'btn btn-primary']) !!}
                {!! Form::close() !!}

              @elseif (!empty($timeslot->visitor_id) && auth()->user()->role == 'agent')
                with: <br>
                <strong>{{ $timeslot->visitor->name }}</strong><br>
                {{ $timeslot->visitor->email }}
                </p>
                @endif

          </div>
          @if (auth()->user()->role == 'agent')
            <div class="col-md-6">
              {!! Form::open(['route' => ['timeslots.destroy', $timeslot->id], 'method' => 'delete']) !!}
              {!! Form::submit('Delete This Booking (Can\'t Undo)', ['class' => 'btn btn-danger']) !!}
              {!! Form::close() !!}
            </div>
          @endif
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
