<?php

namespace App\Listener;

use App\Events\TimeslotGetsBooked;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\User;
use App\Timeslot;
use App\Project;
use Mail;

class EmailVisitor
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  TimeslotGetsBooked  $event
     * @return void
     */
    public function handle(TimeslotGetsBooked $event)
    {
      $user = $event->user;
      $timeslot = $event->timeslot;
      
      Mail::send('emails.assigned', ['user' => $event->user, 'timeslot' => $event->timeslot], function ($m) use ($user) {
        $m->from('afrank@hawskviewhomes.com', Project::first()->name);
        $m->to($user->email, $user->name)->subject('Model Home Timeslot Booked');
      });
    }
}
