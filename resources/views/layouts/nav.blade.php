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

      <span class="navbar-brand">
        <svg style="vertical-align:middle;" width="30" height="30" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 43.64 50.94"><defs><style>.a{fill:#fff;}</style></defs><title>itsbooked-logo</title><path class="a" d="M15.32,16a.86.86,0,0,1,1-1h6.27c3.49,0,6,1.93,6,5.28A4.82,4.82,0,0,1,26,24.74v.06a5,5,0,0,1,3.4,5c0,3.9-3,5.89-6.68,5.89H16.29a.86.86,0,0,1-1-1Zm7.24,7.74a2.93,2.93,0,0,0,3-3.14,2.86,2.86,0,0,0-3.11-3H18.19v6.19Zm.29,9.47a3.31,3.31,0,0,0,3.58-3.52,3.36,3.36,0,0,0-3.58-3.55H18.19v7.06Z"/><path class="a" d="M21.83,50.94,0,38.2V12.74L21.83,0,43.64,12.73V38.21ZM1.33,37.44l20.49,12,20.48-12v-24l-20.48-12L1.33,13.5Z"/></svg>
        it's BOOKED
      </span>

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
