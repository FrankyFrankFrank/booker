<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Timeslot extends Model
{
    protected $fillable = [
      'time',
      'agent'
    ];

    public function scopeAssigned($query)
    {
      $query->where('is_assigned', '=', '1');
    }

    public function scopeUnassigned($query)
    {
      $query->where('is_assigned', '=', '0');
    }

}
