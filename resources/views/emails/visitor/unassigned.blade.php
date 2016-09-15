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
  If you would like to reschedule, please do so now by clicking on the original link sent to your in your invitation email.
</p>
<p>
  itsbooked.online
</p>
