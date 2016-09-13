@extends('layouts.app')

@section('content')


@include('timeslots.timeslotdetails')

@if($cancellable)
  <section>

    <div class="alert alert-warning clearfix">
      <p>
        <button type="submit" class="btn btn-danger" data-toggle="modal" data-target="#confirm-cancel">
          <span class="glyphicon glyphicon-remove"></span> Cancel Your Appointment
        </button>
      </p>
      <p><strong>Note:</strong> You cannot cancel your appointment later than 24 hours prior to your appointment.</p>
    </div>
  </section>
@else
  <section>
    <div class="alert alert-warning">
      <strong><span class="glyphicon glyphicon-time"></span> It is less than 24 Hours before your appointment.</strong> You can not reschedule until further notice.
    </div>
  </section>
@endif

@include('modals.cancelappointment')

@endsection
