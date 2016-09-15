<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AgentFunctionsTest extends TestCase
{
  use DatabaseMigrations;

  public function testAgentCanCreateNewTimeslot()
  {

    $agent = factory(App\User::class)->create();
    $agent->addRole('Agent');
    $agent->roles()->detach(3);

    $this->be($agent);

    $this->visit('/timeslots/create')
      ->type('2017-09-15', 'date')
      ->select('13:30:00', 'time')
      ->press('Submit');

    $this->seePageIs('/timeslots')
    ->see('September 15')
    ->see('1:30 pm');
  }

}
