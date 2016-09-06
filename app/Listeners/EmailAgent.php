<?php

namespace App\Listeners;

use App\Events\TimeslotGetsBooked;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\User;
use App\Timeslot;

class EmailAgent
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
      Mail::send('emails.assigned', ['user' => $event->user, 'timeslot' => $event->timeslot], function ($m) use ($user) {
        $m->from('afrank@hawskviewhomes.com', App\Project::first()->name);
        $m->to($user->email, $user->name)->subject('Model Home Timeslot Booked');
      });
    }
}
