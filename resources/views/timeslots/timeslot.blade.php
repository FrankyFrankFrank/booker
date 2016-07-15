<a href="{{ url('/timeslots', [$timeslot->id] )}}">
  <div class="col-md-4">
    <div class="timeslot">
      <h1>
        {{ date("D, M d", strtotime($timeslot->date)) }} {{ date("g:i a", strtotime($timeslot->time)) }}
      </h1>
      <p>1 Hour</p>
      <p>{{ $timeslot->agent->name }}</p>
    </div>
  </div>
</a>
