@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h1>Edit Project {{ $project->name }}</h1>
      {{ Form::open(['route' => 'projects.store', 'files' => true ]) }}
      {{ Form::hidden('project', $project->id )}}
      <div class="form-group">
        {{ Form::label('name', 'Name:') }}
        {{ Form::text('name', $project->name, ['class' => 'form-control']) }}
      </div>

      <div class="form-group">
        {{ Form::label('logo', 'Logo:') }}
        {{ Form::file('logo') }}
      </div>

      <div class="form-group">
        {{ Form::label('main_color', 'Main Colour:') }}
        {{ Form::input('color', 'main_color', $project->main_color, array('class' => 'input-big')) }}
      </div>

      <div class="form-group">
        {{ Form::label('alt_color', 'Secondary Colour:') }}
        {{ Form::input('color', 'alt_color', $project->alt_color, array('class' => 'input-big')) }}
      </div>

      <div class="form-group">
        {{ Form::submit('Save', ['class' => 'btn btn-primary']) }}
      </div>

      {{ Form::close() }}
    </div>
  </div>
</div>

@endsection
