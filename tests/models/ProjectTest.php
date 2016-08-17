<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ProjectTest extends TestCase
{
  use DatabaseMigrations;

  public function testCanCreateNewProject()
  {

      $project = factory(App\Project::class)->create([
        'name' => 'eby estates',
        'logo' => 'logo.png',
        'main_color' => '#cdcdcd',
        'alt_color' => '#3d0bac',
      ]);

      $this->seeInDatabase('projects', ['name' => 'eby estates', 'logo' => 'logo.png', 'main_color' => '#cdcdcd', 'alt_color' => '#3d0bac']);

  }

  public function testCanAttachAgentToProject()
  {

    $role = factory(App\Role::class)->create([
      'name' => 'Admin',
    ]);

    $project = factory(App\Project::class)->create([
      'name' => 'eby estates',
      'logo' => 'logo.png',
      'main_color' => '#cdcdcd',
      'alt_color' => '#3d0bac',
    ]);

    $agent = factory(App\User::class)->create([
      'name' => 'Test Agent',
    ]);
    
    $agent->roles()->attach(1);

    $project->agents()->attach($agent->id);

    $this->assertEquals( $project->agents, $project->agents);

  }
}
