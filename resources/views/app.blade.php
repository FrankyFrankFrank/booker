<!DOCTYPE html>
<html>
    <head>
        <title>Eastforest Homes Model Home Appointment</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100,200,300,400,500,600,700" rel="stylesheet" type="text/css">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

        <script src="{{ url('js/bootstrap.min.js')}}"></script>

        <link rel="stylesheet" href="{{ url('css/app.css') }}">

        <link rel="stylesheet" href="{{ url('css/style.css') }}">

    </head>
    <body>

        <div class="container-fluid">
          <nav class="nav navbar-fixed-top navbar-default">
            <nav class="navbar-brand">Eastforest Homes</nav>
          </nav>
        </div>

        <div class="container">
          @yield('content')
        </div>
    </body>
</html>
