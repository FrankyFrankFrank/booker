<?php

namespace App\Listeners;

use App\Events\TimeslotGetsCancelled;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\User;
use App\Timeslot;
use App\Project;
use Mail;


class EmailCancelled
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
     * @param  TimeslotGetsCancelled  $event
     * @return void
     */
     public function handle(TimeslotGetsCancelled $event)
     {
       $user = $event->user;
       $timeslot = $event->timeslot;
       $agent = User::find($timeslot->agent_id);
       $project = Project::first();

       Mail::send('emails.agent.unassigned', ['user' => $user, 'timeslot' => $timeslot], function ($m) use ($user, $agent, $project, $timeslot) {
         $m->from(
           'grasslands@itsbooked.com',
           'itsBooked ' . $project->name
         );
         $m->to(
           $agent->email,
           $agent->name
         )
         ->subject('An appointment on ' . date("D, M j", strtotime($timeslot->date)) . ' was cancelled');
       });

       Mail::send('emails.visitor.unassigned', ['user' => $user, 'timeslot' => $timeslot], function ($m) use ($user, $agent, $project, $timeslot) {
         $m->from(
           'grasslands@itsbooked.com',
           'itsBooked ' . $project->name
         );
         $m->to(
           $user->email,
           $user->name
         )
         ->subject('Sales Centre Appointment Cancelled');
       });
     }
}
