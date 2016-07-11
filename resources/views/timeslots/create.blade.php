@extends('app')

@section('content')

  <h1>Create Timeslot</h1>

  {!! Form::open(['url' => 'timeslots']) !!}

    @include('timeslots.form', ['submitButtonText' => 'Submit'])

  {!! Form::close() !!}

  @include('errors.list')

@endsection
