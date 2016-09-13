@extends('layouts.app')

@section('content')




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



@endsection
