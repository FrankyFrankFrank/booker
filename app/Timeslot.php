<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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

    public function scopeAssigned($query)
    {
      $query->whereNotNull('visitor_id');
    }

    public function scopeUnassigned($query)
    {
      $query->whereNull('visitor_id');
    }

    public function scopeScheduled($query)
    {
      $query->where('agent_id', auth()->user()->id);
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
