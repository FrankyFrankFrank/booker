@extends('layouts.app')

@section('content')

  <div class="container">
    <div class="row">
      <div class="col-md-12">

        <h1>You Have Already Booked an Appointment</h1>


        @include('timeslots.timeslotdetails')


        <button type="submit" class="btn btn-danger" data-toggle="modal" data-target="#confirm-cancel">
          <span class="glyphicon glyphicon-remove"></span> Cancel Your Appointment (Cannot be Undone)
        </button>

      </div>
    </div>
  </div>

  @include('modals.cancelappointment')

@endsection
