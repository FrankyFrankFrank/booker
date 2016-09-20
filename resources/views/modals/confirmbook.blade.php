{!! Form::open(['route' => ['assign', $timeslot->id], 'method' => 'patch']) !!}
<div class="modal fade" id="confirm-book{{$timeslot->id}}" tabindex="-1" role="dialog" aria-labelledby="confirmBookLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="confirmBookLabel">Appointment Terms and Conditions</h4>
      </div>
      <div class="modal-body">
        @if (count($errors) > 0)
            <div class="alert alert-danger">
              @foreach ($errors->all() as $error)
                <span class="glyphicon glyphicon-remove" aria-hidden="true"></span> {{ $error }}
              @endforeach
            </div>
        @endif
        <h4>Limitations</h4>
        <p>
          Booking an appointment does not guarantee the opportunity to purchase; lots will be sold on a first-come, first-served basis and may be sold before your appointment date. Appointments are limited, therefore <strong>one buyer is allowed per appointment and one appointment is allowed per email address</strong>. No customizations will be available on floor plans.
        </p>
        <p>
          <strong>Only one purchase per buyer will be permitted.</strong>
        </p>
        <h4>What to bring to your appointment</h4>
        <p>
          In order to purchase, you will be required to bring a deposit cheque of $5000 and government ID for all homebuyers on the Title. If you will be represented by an agent, they must be present at the time of purchase and are required to bring a “Confirmation of Cooperation and Representation” form to your appointment.
        </p>
        <p>
          Once confirmed, you will recieve an email with your appointment details.
        </p>
        <p class="alert alert-info">
          <span class="glyphicon glyphicon-hand-right"></span> You will not be able to cancel or reschedule your appointment later than 24 hours prior to your booking.
        </p>

      </div>
      <div class="modal-footer">
        <div class="form-group">
          <label for="phone">Please Enter Your Phone Number</label>
          <input name="phone" class="form-control" type="tel" />
          <p class="help-block">We will only use this number to contact you regarding your appointment.</p>
        </div>
        <div class="alert alert-warning checkbox">
          <label>
            <input type="checkbox" name="readterms" value="true"> I have read and agree to these terms and conditions.
          </label>
        </div>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Confirm</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
{!! Form::close() !!}

@section('extra-scripts')
  <script type="text/javascript">
  @if (count($errors) > 0)
      $('#confirm-book{{$timeslot->id}}').modal('show');
  @endif
  </script>
@endsection
