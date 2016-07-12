@extends('layouts.app')

@section('content')

  <div class="container">
        <div class="row timeslot @if ($timeslot->is_assigned) timeslot-booked @endif">

          <div class="col-md-6">
            <h1>{{ $timeslot->time }}</h1>

          @if ($timeslot->is_assigned == 0)

            <p>{{ $timeslot->agent }}</p>
            
            {!! Form::model(
              $timeslot,
              [
                'method' => 'PATCH',
                'route' => ['assign', $timeslot->id],
              ])
            !!}

            <div class="btn-group">
                {!! Form::submit(
                  "Book",
                  [
                    'class' => 'btn btn-success'
                  ])
                !!}
            </div>

            {!! Form::close() !!}

          @elseif($timeslot->is_assigned == 1)
            <p>{{ $timeslot->agent }} with: <br>
              John Doe<br>
              1-519-555-1048<br>
              john@example.com
            </p>
          @endif


        </div>
</div>

@endsection
