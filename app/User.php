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

    // Has many timeslots
    public function timeslots()
    {
      return $this->hasMany('App\Timeslot', 'agent_id');
    }

    public function projects()
    {
      return $this->belongsToMany('App\Project');
    }

    public function visiting()
    {
      return $this->hasOne('App\Timeslot', 'visitor_id');
    }

    public function scheduledTimeslots()
    {
      return $this->timeslots()->assigned()->get();
    }

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

}
