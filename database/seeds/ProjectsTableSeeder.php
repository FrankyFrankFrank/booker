<?php

use Illuminate\Database\Seeder;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Project::class)->create([
          'name' => 'Eby Estates',
          'logo' => 'img/eby-estates-logo-header.png',
          'main_color' => '#007f67',
          'alt_color' => '#59C9A5',
        ]);
    }
}
