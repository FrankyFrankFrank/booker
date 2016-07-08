<!DOCTYPE html>
<html>
    <head>
        <title>Eastforest Homes Model Home Appointment</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100,200,300,400,500,600,700" rel="stylesheet" type="text/css">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

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
