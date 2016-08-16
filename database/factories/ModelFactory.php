<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'role' => 'visitor',
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Timeslot::class, function (Faker\Generator $faker) {
  return [
    'time' => $faker->time($format = 'H:') . $faker->randomElement(['30','00']),
    'agent_id' => $faker->randomElement(['2','3']),
    'visitor_id' => null,
    'user_id' => 1,
    'date' => $faker->dateTimeBetween('+1 days', '+4 days')->format('Y/m/d'),
  ];
});

$factory->define(App\Project::class, function (Faker\Generator $faker) {
  return [
    'name' => $faker->city,
    'logo' => 'logo.png',
    'main_color' => $faker->hexcolor,
    'alt_color' => $faker->hexcolor,
  ];
});
