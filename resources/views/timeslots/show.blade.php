@extends('layouts.app')

@section('content')

  <div class="container">
        <div class="row">

          <div class="col-md-12 timeslot @if (!empty($timeslot->visitor_id)) timeslot-booked @endif ">
            <h1>{{ $timeslot->time }}</h1>
            <p>{{ $timeslot->agent->name }}

          @if (empty($timeslot->visitor_id))
            </p>

            {!! Form::open(['route' => ['assign', $timeslot->id], 'method' => 'patch']) !!}
            {!! Form::submit('Click Me!', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}

          @else
            with: <br>
            {{ $timeslot->visitor->name }}<br>
            {{ $timeslot->visitor->email }}
            </p>
          @endif


        </div>
</div>

@endsection
