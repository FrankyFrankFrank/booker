{{-- Temporary --}}

{!! Form::hidden('agent_id', Auth::user()->id) !!}

<div class="form-group">
  {!! Form::label('time', 'Timeslot:') !!}
  {!! Form::select(
    'time',
    [
      '08:00:00' => '8:00',
      '09:00:00' => '9:00',
      '10:00:00' => '10:00',
      '11:00:00' => '11:00',
      '12:00:00' => '12:00',
      '13:00:00' => '1:00',
      '14:00:00' => '2:00',
      '15:00:00' => '3:00',
      '16:00:00' => '4:00',
      '17:00:00' => '5:00',
    ],
    null,
    ['placeholder' => 'Choose a timeslot...', 'class' => 'form-control'])
  !!}
</div>

<div class="form-group">
  {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary']) !!}
</div>
