@extends('layouts.app')

@section('content')

  <div class="container">
    <div class="row">
      <div class="col-md-12">

        <h1>You Have Already Booked an Appointment</h1>
        <h6>Booked On: {{ $timeslot->updated_at }}</h6>
        <div class="panel panel-primary">
          <div class="panel-heading"><h2>Your Appointment:</h2></div>
          {{-- @foreach( auth()->user()->visiting->all() as $timeslot ) --}}
          @foreach( auth()->user()->visiting()->get() as $timeslot )
            <dl class="list-group">
              <div class="list-group-item">
                <dt>Agent:</dt>
                <dd>{{ $timeslot->agent->name }}</dd>
              </div>
              <div class="list-group-item">

                <dt>Time:</dt>
                <dd>{{ date("g:i a", strtotime($timeslot->time)) }}</dd>
              </div>
              <div class="list-group-item">
                <dt>Agent Email:</dt>
                <dd>{{ $timeslot->agent->email }}</dd>
              </div>
            </dl>
          @endforeach
        </div>
        <div class="panel panel-info">
          <div class="panel-heading">
            <h3>Things to Remember:</h3>
          </div>
          <dl class="list-group">
            <div class="list-group-item">
              <dt>Arrive 10 Min Prior</dt>
              <dd>Please arrive ten minutes before your appointment.</dd>
            </div>
            <div class="list-group-item">
              <dt>Appointments are One Hour</dt>
              <dd>We want to ensure that we accomodate everyone who has booked an appointment. Appointments are one hour long and we will do our best to keep this schedule.</dd>
            </div>
            <div class="list-group-item">
              <dt>Lots are Being Reserved</dt>
              <dd>Please keep in mind that lot reservations are first-come-first-serve. We will be taking reservations throughout the day and it is possible your desired lot will be reserved before your appointment.</dd>
            </div>
          </dl>
        </div>

      </div>
    </div>
  </div>"

@endsection
