<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ProjectsTest extends TestCase
{

    use DatabaseMigrations;
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testCanCreateNewProject()
    {

        $project = factory(App\Project::class)->create([
          'name' => 'eby estates',
          'agents' => factory(App\User::class)->create(['name' => 'Lidia', 'role' => 'agent'])->id,
          'logo' => 'logo.png',
          'main_color' => '#cdcdcd',
          'alt_color' => '#3d0bac',
        ]);

        $this->seeInDatabase('projects', ['name' => 'eby estates', 'logo' => 'logo.png', 'agents' => App\User::find('Lidia')->id, 'main_color' => '#cdcdcd', 'alt_color' => '#3d0bac']);

    }
}
