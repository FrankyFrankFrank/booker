<a href="{{ url('/timeslots', [$timeslot->id] )}}">
  <div class="col-md-4">
    <div class="timeslot @if (!empty($timeslot->visitor_id)) timeslot-booked @endif">
      <h1>
        <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
        {{-- {{ date("D, M j", strtotime($timeslot->date)) }} --}}
        {{ date("g:i a", strtotime($timeslot->time)) }}
      </h1>
      <p>
        <span class="glyphicon glyphicon-time" aria-hidden="true"></span> 1 Hour
      </p>
      <p>
        {{ $timeslot->agent->name }}

      @if (empty($timeslot->visitor_id) && auth()->user()->roles->pluck('name')->contains('Visitor'))
      </p>

      {!! Form::open(['route' => ['assign', $timeslot->id], 'method' => 'patch']) !!}
      {!! Form::submit('Book This Time Slot Now', ['class' => 'btn btn-primary']) !!}
      {!! Form::close() !!}

    @elseif (isset($timeslot->visitor_id) && auth()->user()->roles->pluck('name')->contains('Agent'))

        with:
        <br>
        <strong>
          {{ $timeslot->visitor->name }}
        </strong>
        <br>
        {{ $timeslot->visitor->email }}
      </p>

      @endif


    </div>
  </div>
</a>
