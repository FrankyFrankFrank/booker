<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ConfirmationEmailsTest extends TestCase
{
  use DatabaseMigrations;

  public function testVisitorIsEmailedWhenBookingAppointment()
  {
    $timeslot = factory(App\Timeslot::class)->create();
    $user = factory(App\User::class)->create();
    $this->expectsEvents(App\Events\TimeslotGetsBooked::class);
    $timeslot->assign($user, $timeslot);
  }

  public function testAgentIsEmailedWhenAppointmentIsBooked()
  {

  }

}
