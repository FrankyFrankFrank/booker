<div class="col-md-4">
  <div class="timeslot @if (!empty($timeslot->visitor_id)) timeslot-booked @endif">
    <div class="caretdown"></div>
    <h3>
      {{ date("l, F j", strtotime($timeslot->date)) }}</br>
      {{ date("g:i a", strtotime($timeslot->time)) }},  1 Hour
    </h3>
    <p>
      {{ $timeslot->agent->name }}

    @if (empty($timeslot->visitor_id) && auth()->user()->hasRole('Visitor'))
    </p>

      <a id="book-{{$timeslot->id}}" class="btn btn-primary" data-toggle="modal" data-target="#confirm-book{{$timeslot->id}}">Book It!</a>

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
    </p>

      @if(!$timeslot->visitor_id == null)


        <a id="cancel-{{$timeslot->id}}" class="btn btn-danger" data-toggle="modal" data-target="#confirm-cancel-{{$timeslot->id}}"><span class="glyphicon glyphicon-remove"></span> Cancel Appointment</a>

        @include('modals.agent-confirm-cancel')

      @else

        <a id="delete-{{$timeslot->id}}" class="btn btn-primary" data-toggle="modal" data-target="#confirm-delete-{{$timeslot->id}}"><span class="glyphicon glyphicon-remove"></span> Delete Timeslot</a>

        @include('modals.agent-confirm-delete')

      @endif

    @endif

  </div>
  @include('modals.confirmbook')
</div>
