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
        'name' => 'Doon South',
        'logo' => 'img/project-logo-default.png',
        'main_color' => '#2F2235',
        'alt_color' => '#c39a6b',
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
