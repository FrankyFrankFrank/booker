@extends('layouts.app')

@section('content')

<h1>Edit timeslot</h1>

{!! Form::model($timeslot, ['method' => 'patch', 'action' => ['TimeslotsController@update', $timeslot->id]]) !!}

  @include('timeslots.form', ['submitButtonText' => 'Update'])

{!! Form::close() !!}

@include('errors.list')

@endsection
