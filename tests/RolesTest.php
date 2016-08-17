<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RolesTest extends TestCase
{

    use DatabaseMigrations;
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testCanCreateNewRole()
    {
        $role = factory(App\Role::class)->create([
          'name' => 'Agent',
        ]);

        $this->assertEquals($role , $role);
    }

    public function testCanAssignUserToRole()
    {

      $role = factory(App\Role::class)->create([
        'name' => 'Visitor',
      ]);

      $user = factory(App\User::class)->create([
        'name' => 'Test User',
      ]);

      $user->roles()->attach($role->id);

      $this->assertEquals($user->role, $user->role);

    }

}
