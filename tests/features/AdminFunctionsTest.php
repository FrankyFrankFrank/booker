<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AdminFunctionsTest extends TestCase
{
  use DatabaseMigrations;

  public function testAdminCanViewEntireSchedule()
  {

    $visitor = factory(App\User::class)->create();
    $visitor->roles()->attach(3);

    $admin = factory(App\User::class)->create();
    $admin->roles()->attach(1);

    $this->be($admin);

    $timeslot = factory(App\Timeslot::class)->create([
      'visitor_id' => $visitor->id,
    ]);

    $this->visit('/admin/schedule');

    $this->see($visitor->name);

    $this->see($visitor->phone);

  }

}
