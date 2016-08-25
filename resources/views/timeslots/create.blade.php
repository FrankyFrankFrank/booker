@extends('layouts.app')

@section('content')

  <div class="container">
    <div class="row">
      <div class="col-sm-6 col-sm-offset-3">

          <h1>Create New Timeslot</h1

            @include('errors.list')

            {!! Form::model( $agents, ['url' => 'timeslots']) !!}

              @include('timeslots.form', ['submitButtonText' => 'Submit'])

            {!! Form::close() !!}

      </div>
    </div>
  </div>

@endsection
