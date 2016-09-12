<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('foo', function () { $bar->baz(); });

Route::get('/', function () {
      $project = App\Project::first();
      return view('pages.welcome', ['project' => $project]);
});

Route::group(['middleware' => 'auth'], function() {

  Route::patch('timeslots/assign/{id}', 'TimeslotsController@assign')->name('assign');

  Route::patch('timeslots/unassign/{id}', 'TimeslotsController@unassign')->name('unassign');

  Route::resource('timeslots', 'TimeslotsController');

  Route::get('schedule', 'TimeslotsController@viewSchedule');

  Route::get('/your_timeslot', 'TimeslotsController@viewVisitorTimeslot')->name('yourtimeslot');

  Route::resource('projects', 'ProjectsController');

});

Route::auth();

Route::get('/home', 'HomeController@index');

Route::get('autologin/{token}', [
  'as' => 'autologin',
  'uses' => '\Watson\Autologin\AutologinController@autologin'
]);

Route::get('generate_auto_login/user/{id}', 'AutologinGenerator@generate')
  ->name('generatelogin');

Route::get('generate_auto_login/index', 'AutologinGenerator@index')
  ->name('indexgeneratedlogins');

Route::get('/design', function() {
  return view('design.swatch1');
});
