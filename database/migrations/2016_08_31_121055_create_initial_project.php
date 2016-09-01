<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInitialProject extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      DB::table('projects')->insert([
        'name' => 'Eby Estates',
        'logo' => 'img/project-logo-default.png',
        'main_color' => '#007f67',
        'alt_color' => '#59C9A5',
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
