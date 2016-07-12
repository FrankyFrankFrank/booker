@extends('layouts.app')

@section('content')

  <div class="container">
        <div class="row timeslot">

          <div class="col-md-6">
            <h1>{{ $timeslot->time }}</h1>
            <p>{{ $timeslot->agent }}</p>

          @if ($timeslot->is_assigned == 0)
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
            <p>Booked</p>
          @endif


        </div>
</div>

@endsection
