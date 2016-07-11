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
      $query->where('is_assigned', '=', '1');
    }

    public function scopeUnassigned($query)
    {
      $query->where('is_assigned', '=', '0');
    }

    // Timeslot belongs to agent
    public function agent()
    {
      return $this->belongsTo('App\User');
    }

}
