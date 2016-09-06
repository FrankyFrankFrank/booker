<div class="panel panel-primary">
  <div class="panel-heading"><h2>Your Appointment:</h2></div>
    <dl class="list-group">
      <div class="list-group-item">
        <dt>Agent:</dt>
        <dd>{{ $timeslot->agent->name }}</dd>
      </div>
      <div class="list-group-item">
        <dt>Date:</dt>
        <dd>{{ date("D, M d", strtotime($timeslot->date)) }} </dd>
      </div>
      <div class="list-group-item">
        <dt>Time:</dt>
        <dd>{{ date("g:i a", strtotime($timeslot->time)) }}</dd>
      </div>
      <div class="list-group-item">
        <dt>Agent Email:</dt>
        <dd>{{ $timeslot->agent->email }}</dd>
      </div>
      <div class="list-group-item">
        <dt>Booked On:</dt>
        <dd>{{ date("F j, g:i a", strtotime($timeslot->updated_at)) }}</dd>
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
