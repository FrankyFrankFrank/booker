<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TimeslotTest extends TestCase
{
  use DatabaseMigrations;

  public function testCanViewUnassignedTimeslots()
  {

    $role = factory(App\Role::class)->create([
      'name' => 'Admin',
    ]);

    $user = factory(App\User::class)->create();

    $timeslot = factory(App\Timeslot::class)->create([
      'agent_id' => 1,
    ]);

    $user->roles()->attach($role->id);

    $this->be($user);

    $this->visit('/timeslots');

    $this->see(date("g:i a", strtotime($timeslot->time)));
  }

  public function testAgentCanViewTimeslotSchedule()
  {

    $role = factory(App\Role::class)->create([
      'name' => 'Agent',
    ]);

    $user = factory(App\User::class)->create();

    $user->roles()->attach($role->id);

    $this->be($user);

    $timeslot = factory(App\Timeslot::class)->create([
      'visitor_id' => $user->id,
      'agent_id' => $user->id,
    ]);

    $this->visit('schedule');
    $this->see(date("g:i a", strtotime($timeslot->time)));
  }

}
