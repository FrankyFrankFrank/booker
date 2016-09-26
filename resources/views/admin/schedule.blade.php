@extends('layouts.app')

@section('content')

<table class="table table-striped table-condensed">
  <thead>
    <tr>
      <th>
        Date
      </th>
      <th>
        Time
      </th>
      <th>
        Agent
      </th>
      <th>
        Visitor
      </th>
      <th>
        Visitor Phone
      </th>
    </tr>
  </thead>
  <tbody>
    @foreach($booked as $timeslot)
    <tr>
      <td>
        {{ $timeslot->date }}
      </td>
      <td>
        {{ date("g:i a", strtotime($timeslot->time)) }}
      </td>
      <td>
        {{ $timeslot->agent->name }}
      </td>
      <td>
        {{ $timeslot->visitor->name }}
      </td>
      <td>
        {{ $timeslot->visitor->phone }}
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

@endsection
