<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'project_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    // Check if User is an Agent
    public function isAgent()
    {
      if ($this->role == 'agent')
      {
        return true;
      }
      else
      {
        return false;
      }
    }

    // Has many timeslots
    public function timeslots()
    {
      return $this->hasMany('App\Timeslot', 'agent_id');
    }

    // Get Users' Scheduled Timeslots
    public function scheduledTimeslots()
    {
      return $this->timeslots()->assigned()->get();
    }

    // User Belongs to Projects
    public function projects()
    {
      return $this->belongsToMany('App\Project')->withTimestamps();
    }

    // Get Timeslot that User is Visiting
    public function visiting()
    {
      return $this->hasOne('App\Timeslot', 'visitor_id');
    }



}
