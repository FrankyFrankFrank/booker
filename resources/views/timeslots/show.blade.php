@extends('app')

@section('content')

  <div class="row timeslot">
    <div class="col-md-6">
      <h1>{{ $timeslot->time }}</h1>
      <p>{{ $timeslot->agent }}</p>
    </div>
    <div class="col-md-6">
      {!! Form::open(['method' => 'PUT']) !!}
        <div class="btn-group pull-right">
            {!! Form::submit("Book", ['class' => 'btn btn-success']) !!}
        </div>
      {!! Form::close() !!}

    </div>
  </div>


@endsection
