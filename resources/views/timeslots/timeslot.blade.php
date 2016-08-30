  <div class="col-md-4">
    <div class="timeslot @if (!empty($timeslot->visitor_id)) timeslot-booked @endif">
      <a href="{{ url('/timeslots', [$timeslot->id] )}}">
      <h1>
        <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
        {{ date("g:i a", strtotime($timeslot->time)) }}
      </h1>
      <p>
        <span class="glyphicon glyphicon-time" aria-hidden="true"></span> 1 Hour
      </p>
      <p>
        {{ $timeslot->agent->name }}

      @if (empty($timeslot->visitor_id) && auth()->user()->hasRole('Visitor'))
      </p>
      </a>

      <button href="#confirm" class="btn btn-primary" data-toggle="modal" data-target="#confirm-book{{$timeslot->id}}">Book This Time Slot Now</button>

      @include('modals.confirmbook')

      @elseif (isset($timeslot->visitor_id) && auth()->user()->hasRole('Agent'))

        with:
        <br>
        <strong>
          {{ $timeslot->visitor->name }}
        </strong>
        <br>
        {{ $timeslot->visitor->email }}
      </p>
      </a>

      @endif


    </div>
  </div>
