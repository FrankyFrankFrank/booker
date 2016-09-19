<nav class="navbar navbar-inverse navbar-static-top">
  <div class="container-fluid">
    <div class="navbar-header">

      <!-- Collapsed Hamburger -->
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
        <span class="sr-only">Toggle Navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>

      <span class="navbar-brand">it's BOOKED</span>

    </div>

    <div class="collapse navbar-collapse" id="app-navbar-collapse">
      <!-- Left Side Of Navbar -->
      <ul class="nav navbar-nav">

      </ul>

      <!-- Right Side Of Navbar -->
      <ul class="nav navbar-nav navbar-right">
        <li><a href="{{ url('/timeslots') }}">Time Slots</a></li>
        @if(auth()->user())
          @if(auth()->user()->hasRole('Agent'))
            <li><a href="{{ url('/schedule') }}">View Scheduled Appointments</a></li>
          @endif
        @endif
        <!-- Authentication Links -->
        @if (Auth::guest())
          <li><a href="{{ url('/login') }}">Login</a></li>
          {{-- <li><a href="{{ url('/register') }}">Register</a></li> --}}
        @else
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
              {{ Auth::user()->name }} | {{ auth()->user()->role() }} <span class="caret"></span>
            </a>

            <ul class="dropdown-menu" role="menu">
              @if (auth()->user()->hasRole('Admin'))
              <li><a href="{{ route('projects.edit', ['id' => $project->id ]) }}"><span class="glyphicon glyphicon-pencil"></span> Edit Project Details</a></li>
              @endif
              <li><a href="{{ url('/logout') }}"><span class="glyphicon glyphicon-remove"></span> Logout</a></li>
            </ul>
          </li>
        @endif
      </ul>
    </div>
  </div>
</nav>
