<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserTest extends TestCase
{
  use DatabaseMigrations;

  public function testCanCreateNewUser()
  {
      $user = factory(App\User::class)->create([
        'name' => 'Test User',
      ]);

      $this->seeInDatabase('users', ['name' => $user->name]);
  }
}
