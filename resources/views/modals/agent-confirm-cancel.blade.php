{{ Form::open(['action' => ['TimeslotsController@destroy', $timeslot->id], 'method' => 'delete']) }}
<div class="modal fade" id="confirm-cancel-{{ $timeslot->id }}" tabindex="-1" role="dialog" aria-labelledby="confirmBookLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-left" id="confirmBookLabel">Before You Cancel</h4>
      </div>
      <div class="modal-body text-left">
        <h4>Remind the Visitor</h4>
        <p>
          The visitor may not expect the cancellation. Call or email them to let them know.
        </p>
        <h4>If less than 24 hours to the appointment</h4>
        <p>
          Your visitor will not automatically be allowed to reschedule. Please contact the administrator to address this.
        </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Cancel</button>
      </div>
    </div>
  </div>
</div><!-- End Modal-->
{{ Form::close() }}
