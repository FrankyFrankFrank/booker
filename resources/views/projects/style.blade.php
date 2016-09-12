<style>
.navbar-inverse {
  background-color: {{ $project->main_color or 'rgb(196, 154, 108)' }};
}

.navbar-inverse .navbar-nav>.open>a, .navbar-inverse .navbar-nav>.open>a:focus, .navbar-inverse .navbar-nav>.open>a:hover {
  background-color: {{ $project->alt_color or 'rgba(187,137,84,1)' }};
}

</style>
