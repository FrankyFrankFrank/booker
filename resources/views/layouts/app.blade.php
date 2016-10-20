<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>{{ $project->name }} Model Home Booking</title>

  {{-- Favicon --}}
  @include('layouts.favicon')

  <link rel="stylesheet" href="{{ url('css/app.css') }}">
  @include('projects.style')
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.0.1/vue.js"></script>
  <script src="{{ asset('/js/bootstrap.min.js') }}"></script>

</head>
<body id="app-layout">

  @include('layouts.nav')

  <div class="container-fluid">
    <div class="row">
        @include('partials.sidebar')
      <div class="col-md-9 col-lg-10 scroll-content">
        @yield('content')
      </div>
    </div>
  </div>

<footer>
  <a href="{{ url('/usage') }}#privacy" title="Privacy Policy">Privacy Policy</a>
  <a href="{{ url('/usage') }}#terms" title="Terms and Conditions">Terms and Conditions</a>
</footer>

<script src="{{ asset('/js/app.js') }}"></script>
@yield('extra-scripts')

</body>



</html>
