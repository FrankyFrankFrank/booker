<h1>An appointment on {{ date("D, M j", strtotime($timeslot->date)) }} was cancelled</h1>
<h4>Cancellation Details</h4>
<ul>
  <li>
    Visitor: {{ $user->name }} | {{ $user->email }}
  </li>
  <li>
    Date: {{ date("D, M j", strtotime($timeslot->date)) }}
  </li>
  <li>
    Time: {{ date("g:i a", strtotime($timeslot->time)) }}
  </li>
</ul>
<p>
  This email was automatically generated, do not reply.
</p>
