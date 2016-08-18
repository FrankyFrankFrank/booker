<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
      'name',
      'logo',
      'main_color',
      'alt_color',
    ];

    // Timeslot Project Relationship
    public function agents()
    {
      return $this->belongsToMany('App\User')->withTimestamps();
    }

    // Project has many timeslots
    public function timeslots()
    {
      return $this->hasMany('App\Timeslot');
    }
}
