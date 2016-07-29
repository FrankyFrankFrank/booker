@extends('layouts.app')

@section('content')

  <div class="container">
    <div class="row">
      <div class="col-sm-6 col-sm-offset-3">

          <h1>Create Timeslot</h1>

            {!! Form::open(['url' => 'timeslots']) !!}

              @include('timeslots.form', ['submitButtonText' => 'Submit'])

            {!! Form::close() !!}

            @include('errors.list')
      </div>
    </div>
  </div>

@endsection
