<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ConfirmationEmailsTest extends TestCase
{
  use DatabaseMigrations;

  public function testVisitorIsEmailedWhenBookingAppointment()
  {
    $this->visit('/register')
         ->type('Visitor', 'name')
         ->type('tester@example.com', 'email')
         ->type('password', 'password')
         ->type('password', 'password_confirmation')
         ->press('Register')
         ->expectsEvents(App\Events\TimeslotGetsBooked::class);
  }

  public function testAgentIsEmailedWhenAppointmentIsBooked()
  {

  }

}
