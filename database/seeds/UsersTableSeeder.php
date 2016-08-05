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
        'role' => 'visitor',
        'email' => 'adam@example.com',
        'password' => Hash::make('password'),
      ]);
      factory(App\User::class)->create([
        'name' => 'Lidia Adamska',
        'role' => 'agent',
        'email' => 'lidia@example.com',
        'password' => Hash::make('password'),
      ]);
      factory(App\User::class)->create([
        'name' => 'Dan Elliott',
        'role' => 'agent',
        'email' => 'dan@example.com',
        'password' => Hash::make('password'),
      ]);
      factory(App\User::class, 40)->create();
    }
}
