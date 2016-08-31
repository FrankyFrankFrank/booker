<style>
.navbar-inverse {
  background-color: {{ $project->main_color or '#007f67' }};
}

.navbar-inverse .navbar-nav>.open>a, .navbar-inverse .navbar-nav>.open>a:focus, .navbar-inverse .navbar-nav>.open>a:hover {
  background-color: {{ $project->alt_color or '#59C9A5' }};
}

</style>
