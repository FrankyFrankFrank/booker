@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading text-center"><h2>Book your Eby Estates Model Home VIP Appointment</h2></div>

                <div class="panel-body">
                  @if (Auth::user())
                    <a class="btn btn-primary" href="/timeslots">View Timeslots</a>
                  @else
                    <p class="text-center">
                    <a class="btn btn-primary" href="/login">Log In and Book</a>
                    OR
                    <a class="btn btn-primary" href="/register">Register</a>
                    </p>
                  @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
