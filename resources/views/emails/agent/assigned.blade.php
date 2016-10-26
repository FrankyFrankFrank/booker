<h1>Appointment booked on: {{ date("D, M j", strtotime($timeslot->date)) }}</h1>
<h3>{{ $project->name }}</h3>
<p>
  Dear {{$agent->name}}, An appointment has been booked.
</p>
<h4>Details</h4>
<ul>
  <li>
    Visitor: {{ $user->name }} - {{ $user->email }}
  </li>
  <li>
    Visitor Phone: {{ $user->phone }}
  </li>
  <li>
    Date: {{ date("D, M j", strtotime($timeslot->date)) }}
  </li>
  <li>
    Time: {{ date("g:i a", strtotime($timeslot->time)) }}
  </li>
</ul>
<p>
  To View Your Appointment Schedule, log in <a href="{{ url('/') }}">here</a>.
</p>
<p>
  This email was automatically generated, do not reply.
</p>
<p>
  itsbooked.online
</p>
