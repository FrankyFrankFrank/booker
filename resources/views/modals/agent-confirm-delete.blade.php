{{ Form::open(['action' => ['TimeslotsController@destroy', $timeslot->id], 'method' => 'delete']) }}
<div class="modal fade" id="confirm-delete-{{ $timeslot->id }}" tabindex="-1" role="dialog" aria-labelledby="confirmBookLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-left" id="confirmBookLabel">Are You Sure?</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Delete</button>
      </div>
    </div>
  </div>
</div><!-- End Modal-->
{{ Form::close() }}
