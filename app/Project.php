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

    public function agents()
    {
      return $this->belongsToMany('App\User')->withTimestamps();
    }

    public function timeslots()
    {
      return $this->hasMany('App\Timeslot');
    }
}
