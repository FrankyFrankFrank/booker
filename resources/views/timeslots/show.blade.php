@extends('app')

@section('content')

  <div class="row timeslot">

    <div class="col-md-6">
      <h1>{{ $timeslot->time }}</h1>
      <p>{{ $timeslot->agent }}</p>
    </div>

    <div class="col-md-6">
    @if ($timeslot->is_assigned == 0)
      {!! Form::model(
        $timeslot,
        [
          'method' => 'PATCH',
          'route' => ['assign', $timeslot->id],
        ])
      !!}

      <div class="btn-group pull-right">
          {!! Form::submit(
            "Book",
            [
              'class' => 'btn btn-success'
            ])
          !!}
      </div>

      {!! Form::close() !!}

    @elseif($timeslot->is_assigned == 1)
      <p class="text-right">Booked</p>
    @endif
    </div>

  </div>


@endsection
