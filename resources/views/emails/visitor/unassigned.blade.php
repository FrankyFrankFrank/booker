<h1>You Have Cancelled Your Sales Centre Appointment</h1>
<h4>Cancellation Details</h4>
<ul>
  <li>
    Agent: {{ $timeslot->agent->name }}
  </li>
  <li>
    Time: {{ date("g:i a", strtotime($timeslot->time)) }}
  </li>
  <li>
    Date: {{ date("D, M j", strtotime($timeslot->date)) }}
  </li>
</ul>
<p>
  itsbooked.online
</p>
