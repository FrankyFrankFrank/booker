<div class="col-md-4">
  <div class="timeslot @if (!empty($timeslot->visitor_id)) timeslot-booked @endif">
    <a href="{{ url('/timeslots', [$timeslot->id] )}}">
    <h1>
      <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
      {{ date("D, M j", strtotime($timeslot->date)) }} |
      {{ date("g:i a", strtotime($timeslot->time)) }}
    </h1>
    <p>
      <span class="glyphicon glyphicon-time" aria-hidden="true"></span> 1 Hour
    </p>
  </a>
    <p>
      {{ $timeslot->agent->name }}

    @if (empty($timeslot->visitor_id) && auth()->user()->hasRole('Visitor'))
    </p>

      <button class="btn btn-primary" data-toggle="modal" data-target="#confirm-book{{$timeslot->id}}">Book This Time Slot Now</button>

      @if(Request::path() != 'timeslots/'.$timeslot->id)

      <a class="btn btn-primary" href="{{ url('/timeslots', [$timeslot->id] )}}">More Details</a>

    @endif


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

    @endif

    @if( $timeslot->agent_id == auth()->user()->id )

      {{ Form::open(['action' => ['TimeslotsController@destroy', $timeslot->id], 'method' => 'delete']) }}
        <button type="submit" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span> Delete Timeslot</button>
      {{ Form::close() }}
    @endif

  </div>
</div>

@if($id % 3 == 2)
<div class="clearfix">
</div>
@endif
