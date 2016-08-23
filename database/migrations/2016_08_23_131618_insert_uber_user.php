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
      DB::table('roles')->insert([
        'name' => 'Admin'
      ]);

      DB::table('roles')->insert([
        'name' => 'Agent'
      ]);

      DB::table('roles')->insert([
        'name' => 'Visitor'
      ]);

      DB::table('users')->insert([
        'name' => 'Admin',
        'email' => 'afrank@hawksviewhomes.com',
        'password' => bcrypt('r$1X95Rrm391'),
      ]);

      DB::table('role_user')->insert([
        'role_id' => '1',
        'user_id' => '1',
      ]);

      DB::table('role_user')->insert([
        'role_id' => '2',
        'user_id' => '1',
      ]);
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
