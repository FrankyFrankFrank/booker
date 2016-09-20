<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use App\User;
use App\Role;

class InsertUberUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Role::create([
        'name' => 'Admin'
      ]);
      Role::create([
        'name' => 'Agent'
      ]);
      Role::create([
        'name' => 'Visitor'
      ]);

      User::create([
        'name' => env('APP_OVERLORD_NAME'),
        'email' => env('APP_OVERLORD_EMAIL'),
        'password' => bcrypt(env('APP_OVERLORD_PASSWORD')),
      ])->roles()->sync([1,2]);
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
