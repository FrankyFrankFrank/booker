<div class="col-md-4">
  <div class="timeslot @if (!empty($timeslot->visitor_id)) timeslot-booked @endif">
    <div class="caretdown"></div>
    <a href="{{ url('/timeslots', [$timeslot->id] )}}">
    <h3>
      {{ date("l, F j", strtotime($timeslot->date)) }}</br>
      {{ date("g:i a", strtotime($timeslot->time)) }},  1 Hour
    </h3>
  </a>
    <p>
      {{ $timeslot->agent->name }}

    @if (empty($timeslot->visitor_id) && auth()->user()->hasRole('Visitor'))
    </p>

      <a id="book-{{$timeslot->id}}" class="btn btn-primary" data-toggle="modal" data-target="#confirm-book{{$timeslot->id}}">Book This Time Slot Now</a>

    @elseif (isset($timeslot->visitor_id) && auth()->user()->hasRole('Agent'))

      with:
      <br>
      <strong>
        {{ $timeslot->visitor->name }}<br />
         Phone Number: {{ $timeslot->visitor->phone }}
      </strong>
      <br>
      {{ $timeslot->visitor->email }}
    </p>

    @endif

    @if( $timeslot->agent_id == auth()->user()->id )

      {{ Form::open(['action' => ['TimeslotsController@destroy', $timeslot->id], 'method' => 'delete']) }}
        <button type="submit" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span> Delete Timeslot</button>
      {{ Form::close() }}
    @endif

  </div>
  @include('modals.confirmbook')
</div>
