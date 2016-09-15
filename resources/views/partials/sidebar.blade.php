  <div class="col-md-3 col-lg-2 sidebar">

    <div class="row top">
      <div class="col-md-12">
        <a href="{{ url('/') }}">
          <img class="logo center-block" src="{{ asset($project->logo) }}" alt="{{ $project->name }}">
        </a>
        @if(Route::current()->getName() != 'welcome')
        <h4 class="text-center">{{ $project->name }}</h4>
        @endif
      </div>
    </div>

    <div class="row bottom">
      <div class="col-md-12">
      </div>
    </div>

  </div>
