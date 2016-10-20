@extends('layouts.app')

@section('content')




          <h1>Create New Timeslot</h1>

          <div class="row">
            <div class="col-md-6">
              @if(isset($timeslot))
                <div class="alert alert-success" role="alert">
                  You've created a new timeslot on {{ date("l, F j", strtotime($timeslot->date)) }} at {{ date("g:i a", strtotime($timeslot->time)) }}.
                </div>
              @endif

              {!! Form::open(['url' => 'timeslots']) !!}

              @include('timeslots.form', ['submitButtonText' => 'Submit'])

              {!! Form::close() !!}

              @include('errors.list')
            </div>
          </div>



@endsection
