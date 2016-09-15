<h1>Thank You For Booking Your Appointment</h1>
<h3>{{ $project->name }}</h3>
<p>
  This is a confirmation of your appointment with {{ $timeslot->agent->name }} on {{ date("D, M j", strtotime($timeslot->date)) }} at {{ date("g:i a", strtotime($timeslot->time)) }}.
</p>
<p>
  <strong>Address:</strong> {{ $project->address }}
</p>
<h4>You are required to bring:</h4>
<ul>
  <li>
    A $5000 deposit cheque
  </li>
  <li>
    Government ID for all homebuyers on the title
  </li>
  <li>
    A “Confirmation of Cooperation and Representation” form, if represented by an agent
  </li>
</ul>
<h5>Notes:</h5>
<p>
  Please arrive 10 minutes prior to your appointment. Late arrival may result in the cancellation of your appointment. If you cannot make your appointment, please use your original login link to cancel 24 hours prior to your scheduled time. Late cancellations will not be able to reschedule.
</p>
<p>
  itsbooked.online
</p>
