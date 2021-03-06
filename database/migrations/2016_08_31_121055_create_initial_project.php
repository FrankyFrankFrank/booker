<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use App\Project;

class CreateInitialProject extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Project::create([
        'name' => 'Grasslands of Stauffer Woods',
        'logo' => 'img/project-logo-default.png',
        'main_color' => '#2c3e50',
        'alt_color' => '#d25627',
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
