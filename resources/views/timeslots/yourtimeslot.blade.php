@extends('layouts.app')

@section('content')

  <div class="container">
    <div class="row">
      <div class="col-md-12">

        <h1>You Have Already Booked an Appointment</h1>


        @include('timeslots.timeslotdetails')

        {!! Form::open(['route' => ['unassign', $timeslot->id], 'method' => 'patch']) !!}
        <button type="submit" class="btn btn-danger">
          <span class="glyphicon glyphicon-remove"></span> Cancel Your Appointment
        </button> (Cannot be Undone)
        {!! Form::close() !!}

      </div>
    </div>
  </div>

@endsection
