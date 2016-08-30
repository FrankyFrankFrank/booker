{!! Form::open(['route' => ['assign', $timeslot->id], 'method' => 'patch']) !!}
<div class="modal fade" id="confirm-book{{$timeslot->id}}" tabindex="-1" role="dialog" aria-labelledby="confirmBookLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="confirmBookLabel">Confirm Book This appointment</h4>
      </div>
      <div class="modal-body">
        <p>Once confirmed, you will recieve an email with your appointment details.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Confirm</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
{!! Form::close() !!}
