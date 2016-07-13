@extends('layouts.app')

@section('content')

  <div class="container">
        <div class="row timeslot @if (!empty($timeslot->visitor_id)) timeslot-booked @endif">

          <div class="col-md-6">
            <h1>{{ $timeslot->time }}</h1>
            <p>{{ $timeslot->agent->name }}

          @if (empty($timeslot->visitor_id))
            </p>

            {!! Form::open(['route' => ['assign', $timeslot->id], 'method' => 'patch']) !!}
            {!! Form::submit('Click Me!', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}

          @else
              with: <br>
              John Doe<br>
              1-519-555-1048<br>
              john@example.com
            </p>
          @endif


        </div>
</div>

@endsection
