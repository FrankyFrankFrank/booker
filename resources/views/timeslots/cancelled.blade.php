@extends('layouts.app')

@section('content')

<div class="cancelled-message">

<h1 class="text-center">You Have Successfully Cancelled Your Appointment.</h1>

<p class="text-center"><a class="btn btn-primary" href="{{ url('/') }}">Finish</a> or <a class="btn btn-primary" href="{{ url('/timeslots') }}">View Available Timeslots</a></p>

</div>
@endsection
