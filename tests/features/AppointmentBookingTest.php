<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AppointmentBookingTest extends TestCase
{
  use DatabaseMigrations;


  public function testUserIsAskedForPhoneNumberBeforeBooking()
  {
    $user = factory(App\User::class)->create();
    $timeslot = factory(App\Timeslot::class)->create();

    $this->be($user);

    $this->visit('/timeslots');
    $this->click('book-' . $timeslot->id);

    $this->see('Please Enter Your Phone Number');
    //

  }

}
