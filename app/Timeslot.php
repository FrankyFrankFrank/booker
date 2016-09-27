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

    // Scope where agent_id is the same as the given user
    public function scopeBelongsToAgent($query, $user)
    {
      return $query->where('agent_id', $user->id);
    }

    // Timeslot Cancellation Eligibility
    public function canCancel()
    {
      // Last Cancellation Date
      $x = Carbon::parse($this->date . " " . $this->time)->subHours(24);
      // Run Check
      if (Carbon::now() > $x)
      {
        return false;
      } else {
        return true;
      }
    }

    // Scope where the timeslot belongs to the logged in agent
    public function scopeScheduled($query)
    {
      $query->where('agent_id', auth()->user()->id);
    }

    // Assign a timeslot
    public function assign($visitor)
    {
      $this->visitor_id = $visitor->id;

      $this->save();

      event(new TimeslotGetsBooked($this, $visitor));

    }

    // Cancel a timeslot
    public function cancel($visitor)
    {
      $this->visitor_id = null;

      $this->save();

      event(new TimeslotGetsCancelled($this, $visitor));

    }

    // Timeslot belongs to agents
    public function agent()
    {
      return $this->belongsTo('App\User', 'agent_id');
    }

    // Timeslot belongs to visitor
    public function visitor()
    {
      return $this->belongsTo('App\User', 'visitor_id');
    }

    // Timeslot belongs to project
    public function project()
    {
      return $this->belongsTo('App\Project');
    }

    public static function availableByDay()
    {
      return self::orderBy('date', 'asc')
        ->orderBy('time', 'asc')
        ->unassigned()
        ->future()
        ->get()
        ->groupBy('date');
    }

    public static function unavailableByDay()
    {
      return self::orderBy('date', 'asc')
        ->orderBy('time', 'asc')
        ->assigned()
        ->future()
        ->get()
        ->groupBy('date');
    }

}
