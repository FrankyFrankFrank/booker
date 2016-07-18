<h1>Thank You For Booking Your Timeslot</h1>
<h4>Confirmation Details</h4>
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
