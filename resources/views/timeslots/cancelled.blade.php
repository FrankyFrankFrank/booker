@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row">
    <div class="col-md-12">

      <h1 class="text-center cancelled-message">You Have Successfully Cancelled Your Appointment.</h1>
      <p class="text-center"><a class="btn btn-primary" href="{{ url('/') }}">Finish</a> or <a class="btn btn-primary" href="{{ url('/timeslots') }}">View Available Timeslots</a></p>

    </div>
  </div>
</div>

@endsection
