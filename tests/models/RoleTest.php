<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RoleTest extends TestCase
{
  use DatabaseMigrations;

  public function testCanAssignUserToRole()
  {

    $role = factory(App\Role::class)->create([
      'name' => 'Admin',
    ]);

    $user = factory(App\User::class)->create([
      'name' => 'Test User',
    ]);

    $user->addRole('Admin');

    $this->assertTrue($user->hasRole('Admin'));

  }

}
