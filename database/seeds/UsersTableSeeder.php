<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory(App\User::class)->create([
        'name' => 'Adam Frank',
        'email' => 'adam@example.com',
        'password' => Hash::make('password'),
      ])->roles()->attach(3);

      factory(App\User::class)->create([
        'name' => 'Lidia Adamska',
        'email' => 'lidia@example.com',
        'password' => Hash::make('password'),
      ])->roles()->attach(2);

      factory(App\User::class)->create([
        'name' => 'Dan Elliott',
        'email' => 'dan@example.com',
        'password' => Hash::make('password'),
      ])->roles()->attach(2);

      factory(App\User::class, 10)->create()
      ->each(function ($user) {
        $user->roles()->attach(3);
      });
    }
}
