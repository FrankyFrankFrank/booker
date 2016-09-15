<div class="panel panel-default">

  <div class="panel-heading">
    <h2>Your Appointment:</h2>
    <h6>Booked on: {{ date("F j, g:i a", strtotime($timeslot->updated_at)) }}</h6>
  </div>

  <dl class="list-group">

    <div class="list-group-item">
      <h4>Date &amp; Time:</h4>
      {{ date("l, F d", strtotime($timeslot->date)) }} <br />
      {{ date("g:i a", strtotime($timeslot->time)) }}
    </div>

    <div class="list-group-item">
      <h4>Agent:</h4>
      {{ $timeslot->agent->name }} <br />
      {{ $timeslot->agent->email }}
    </div>

    <div class="list-group-item">
      <dt class="text-info"><span class="glyphicon glyphicon-alert"></span> You are Required to Bring</dt>
      <ol>
        <li>A $5000 deposit cheque</li>
        <li>
          Government ID for all homebuyers on the title
        </li>
        <li>
          A “Confirmation of Cooperation and Representation” form, if represented by an agent
        </li>
      </ol>
    </div>

    <div class="list-group-item">
      <dt class="text-info">Arrive 10 Minutes Prior</dt>
      <dd>Please arrive ten minutes before your appointment.</dd>
    </div>

    <div class="list-group-item">
      <dt class="text-info">Appointments are One Hour</dt>
      <dd>We want to ensure that we accomodate everyone who has booked an appointment. Appointments are one hour long and we will do our best to keep to this schedule.</dd>
    </div>

    <div class="list-group-item">
      <dt class="text-info">Lots are Being Reserved</dt>
      <dd>Please keep in mind that lot reservations are first-come-first-serve. We will be taking reservations throughout the day and it is possible your desired lot will be reserved before your appointment.</dd>
    </div>

  </dl>
</div>
