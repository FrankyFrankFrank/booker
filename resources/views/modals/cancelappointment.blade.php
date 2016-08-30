{!! Form::open(['route' => ['unassign', $timeslot->id], 'method' => 'patch', 'id' => 'cancel-appointment']) !!}
  <div class="modal fade"  id="confirm-cancel" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="model-title">Are you sure you want to cancel your appointment?</h3>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Go Back</button>
            <button type="submit" class="btn btn-primary">Cancel Appointment</button>
        </div>
      </div>
    </div>
  </div>
{!! Form::close() !!}
