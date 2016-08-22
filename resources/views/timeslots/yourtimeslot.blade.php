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

  {!! Form::open(['route' => ['unassign', $timeslot->id], 'method' => 'patch', 'id' => 'cancel-appointment']) !!}
        <div class="modal fade"  id="confirm-cancel" tabindex="-1" role="dialog">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="model-title">Are you sure you want to cancel your appointment?</h3>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Go Back</button>
                  <button type="submit" class="btn btn-primary">Cancel Appointment</button>
              </div>
            </div>
          </div>
        </div>
{!! Form::close() !!}

@endsection
