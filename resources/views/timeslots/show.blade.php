@extends('layouts.app')

@section('content')

<div class="row">
  <div class="col-md-12">
    <h1>Timeslot Info</h1>
  </div>
</div>
<div class="row">
  @include('timeslots.timeslot')
</div>

@endsection
