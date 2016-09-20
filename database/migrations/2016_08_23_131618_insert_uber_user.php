<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InsertUberUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      DB::table('roles')->insert([[
        'name' => 'Admin'
      ],[
        'name' => 'Agent'
      ],[
        'name' => 'Visitor'
      ]]);

      DB::table('users')->insert([[
        'name' => 'Adam Frank',
        'email' => 'afrank@hawksviewhomes.com',
        'password' => bcrypt(env('APP_OVERLORD')),
      ],[
        'name' => 'Test Visitor',
        'email' => 'visitor@example.com',
        'password' => Hash::make('password'),
      ],[
        'name' => 'Test Agent',
        'email' => 'agent@example.com',
        'password' => Hash::make('password'),
      ]]);

      DB::table('role_user')->insert([[
        'role_id' => '1',
        'user_id' => '1',
      ],[
        'role_id' => '2',
        'user_id' => '1',
      ],[
        'role_id' => '3',
        'user_id' => '2',
      ],[
        'role_id' => '2',
        'user_id' => '3',
      ]]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
