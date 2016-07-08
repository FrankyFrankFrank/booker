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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/timeslots', 'TimeslotsController@index');

Route::post('/timeslots', 'TimeslotsController@store');

Route::get('/timeslots/create', 'TimeslotsController@create');

Route::get('/timeslots/{id}', 'TimeslotsController@show');

Route::put('/timeslots/{id}', 'TimeslotsController@update');
