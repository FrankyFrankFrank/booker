@extends('layouts.app')

@section('content')

  <div class="container">
    <div class="row">
      <div class="col-md-12">

        <h1>Edit timeslot</h1>

        {!! Form::model($timeslot, ['method' => 'patch', 'action' => ['TimeslotsController@update', $timeslot->id]]) !!}

          @include('timeslots.form', ['submitButtonText' => 'Update'])

        {!! Form::close() !!}

        @include('errors.list')
      </div>
    </div>
  </div>


@endsection
