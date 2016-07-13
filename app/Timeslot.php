<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Timeslot extends Model
{
    protected $fillable = [
      'time',
      'agent',
      'user_id' //Temporary
    ];

    public function scopeAssigned($query)
    {
      $query->whereNotNull('visitor_id');
    }

    public function scopeUnassigned($query)
    {
      $query->whereNull('visitor_id');
    }

    // Timeslot belongs to agent
    public function agent()
    {
      return $this->belongsTo('App\User');
    }

    public function visitor()
    {
      return $this->belongsTo('App\User');
    }

}
