<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Events\TimeslotGetsBooked;
use App\Events\TimeslotGetsCancelled;

use Carbon\Carbon;

class Timeslot extends Model
{
    protected $fillable = [
      'time',
      'agent_id',
      'visitor_id',
      'user_id',
      'project_id',
      'date',
    ];

    // Scope where the timeslot has a booked visitor
    public function scopeAssigned($query)
    {
      return $query->whereNotNull('visitor_id');
    }

    // Scope where the timeslot has no visitor
    public function scopeUnassigned($query)
    {
      return $query->whereNull('visitor_id');
    }

    // Scope where the timeslot is in the future
    public function scopeFuture($query)
    {
      $query->where('date', '>' , Carbon::yesterday());
    }

    // Scope where the timeslot is in the past
    public function scopePast($query)
    {
      $query->where('date', '<' , Carbon::yesterday());
    }

    // Scope where timeslot is past the latest cancellation time
    public function scopePastCancellation($query)
    {

    }

    // Scope where the timeslot belongs to the logged in agent
    public function scopeScheduled($query)
    {
      $query->where('agent_id', auth()->user()->id);
    }

    // Assign a timeslot
    public function assign($visitor, $timeslot)
    {
      $timeslot->visitor_id = $visitor->id;

      $timeslot->save();

      event(new TimeslotGetsBooked($timeslot, $visitor));

    }

    // Cancel a timeslot
    public function cancel($visitor, $timeslot)
    {
      $timeslot->visitor_id = null;

      $timeslot->save();

      event(new TimeslotGetsCancelled($user, $timeslot));

    }

    // Timeslot belongs to agents
    public function agent()
    {
      return $this->belongsTo('App\User');
    }

    // Timeslot belongs to visitor
    public function visitor()
    {
      return $this->belongsTo('App\User');
    }

    // Timeslot belongs to project
    public function project()
    {
      return $this->belongsTo('App\Project');
    }

}
