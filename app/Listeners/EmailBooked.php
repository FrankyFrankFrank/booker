<?php

namespace App\Listeners;

use App\Events\TimeslotGetsBooked;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class EmailBooked
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
       $agent = User::find($timeslot->agent_id);
       $project = Project::first();

       Mail::send('emails.agent.assigned', ['user' => $user, 'timeslot' => $timeslot, 'agent' => $agent, 'project' => $project], function ($m) use ($user, $agent, $project, $timeslot) {
         $m->from(
           'grasslands@itsbooked.com',
           'itsBooked ' . $project->name
         );
         $m->to(
           $agent->email,
           $agent->name
         )
         ->subject(
           'Sales Centre Timeslot Booked'
         );
       });

       Mail::send('emails.visitor.assigned', ['user' => $user, 'timeslot' => $timeslot, 'agent' => $agent, 'project' => $project], function ($m) use ($user, $agent, $project, $timeslot) {
         $m->from(
           'grasslands@itsbooked.com',
           'itsBooked ' . $project->name
         );
         $m->to(
           $user->email,
           $user->name
         )
         ->subject(
           'Sales Centre Timeslot Booked'
         );
       });
     }
}
