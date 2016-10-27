{!! Form::hidden('user_id', Auth::user()->id) !!}

@if(auth()->user()->hasRole('Admin'))
<div class="form-group">
  {!! Form::label('agent_id', 'Agent:') !!}
  <select name="agent_id" placeholder="Choose an agent" class="form-control">
    @foreach($agents as $agent)
    <option value="{{ $agent->id }}">{{ $agent->name }}</option>
    @endforeach
  </select>
</div>
@else
{!! Form::hidden('agent_id', Auth::user()->id) !!}
@endif

<div class="form-group">
  {!! Form::label('date', 'Date:') !!}
  {!! Form::date('date', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
  {!! Form::label('time', 'Timeslot:') !!}
  {!! Form::select(
    'time',
    [
      '12:00:00' => '12:00 pm',
      '12:30:00' => '12:30 pm',
      '13:00:00' => '1:00 pm',
      '13:30:00' => '1:30 pm',
      '14:00:00' => '2:00 pm',
      '14:30:00' => '2:30 pm',
      '15:00:00' => '3:00 pm',
      '15:30:00' => '3:30 pm',
      '16:00:00' => '4:00 pm',
      '16:30:00' => '4:30 pm',
      '17:00:00' => '5:00 pm',
      '17:30:00' => '5:30 pm',
      '18:00:00' => '6:00 pm',
    ],
    null,
    ['placeholder' => 'HH:MM', 'class' => 'form-control'])
  !!}
</div>

<div class="form-group">
  {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary']) !!}
  {!! Form::submit('Save and Create Another', ['class' => 'btn btn-primary', 'name' => 'save_and_create']) !!}
</div>
