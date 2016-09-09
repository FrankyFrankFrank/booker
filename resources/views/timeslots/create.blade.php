@extends('layouts.app')

@section('content')

  <div class="container">
    <div class="row">
      <div class="col-sm-6 col-sm-offset-3">

          <h1>Create New Timeslot</h1>

            @if(isset($timeslot))
            <div class="alert alert-success" role="alert">
              You've created a new timeslot on {{$timeslot->date}} at {{ $timeslot->time }}.
            </div>
            @endif

            {!! Form::open(['url' => 'timeslots']) !!}

              @include('timeslots.form', ['submitButtonText' => 'Submit'])
              
            {!! Form::close() !!}

            @include('errors.list')
      </div>
    </div>
  </div>

@endsection
