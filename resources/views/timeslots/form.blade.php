{{-- Temporary --}}

{!! Form::hidden('user_id', 1) !!}

<div class="form-group">
  {!! Form::label('agent', 'Agent:') !!}
  {!! Form::select(
    'agent',
    ['Lidia Adamska' => 'Lidia Adamska', 'Dan Elliot' => 'Dan Elliot'],
    null,
    ['placeholder' => 'Choose an agent...', 'class' => 'form-control'])
  !!}
</div>

<div class="form-group">
  {!! Form::label('time', 'Timeslot:') !!}
  {!! Form::select(
    'time',
    [
      '08:00:00' => '8:00',
      '08:20:00' => '8:20',
      '08:40:00' => '8:40',
      '09:00:00' => '9:00',
      '09:20:00' => '9:20',
      '09:40:00' => '9:40',
      '10:00:00' => '10:00',
      '10:20:00' => '10:20',
      '10:40:00' => '10:40',
      '11:00:00' => '11:00',
      '11:20:00' => '11:20',
      '11:40:00' => '11:40',
      '12:00:00' => '12:00',
      '12:20:00' => '12:20',
      '12:40:00' => '12:40',
      '13:00:00' => '1:00',
      '13:20:00' => '1:20',
      '13:40:00' => '1:40',
      '14:00:00' => '2:00',
      '14:20:00' => '2:20',
      '14:40:00' => '2:40',
      '15:00:00' => '3:00',
      '15:20:00' => '3:20',
      '15:40:00' => '3:40',
      '16:00:00' => '4:00',
      '16:20:00' => '4:20',
      '16:40:00' => '4:40',
      '17:00:00' => '5:00',
      '17:20:00' => '5:20',
      '17:40:00' => '5:40'
    ],
    null,
    ['placeholder' => 'Choose a timeslot...', 'class' => 'form-control'])
  !!}
</div>

<div class="form-group">
  {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary']) !!}
</div>
