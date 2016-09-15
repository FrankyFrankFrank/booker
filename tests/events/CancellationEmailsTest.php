<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CancellationEmailsTest extends TestCase
{
  use DatabaseMigrations;

  public function testVisitorIsEmailedWhenCancellingAppointment()
  {
    $timeslot = factory(App\Timeslot::class)->create();
    $user = factory(App\User::class)->create();
    $timeslot->assign($user, $timeslot);
    $this->expectsEvents(App\Events\TimeslotGetsCancelled::class);
    $timeslot->cancel($user, $timeslot);
  }

  public function testAgentIsEmailedWhenAppointmentIsBooked()
  {

  }

}
