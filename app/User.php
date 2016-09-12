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

    // User belongs to many roles

    public function roles()
    {
      return $this->belongsToMany('App\Role')->withTimestamps();
    }

    public function role()
    {
      return $this->roles()->first()->name;
    }

    // Check if User has a $role
    public function hasRole($role)
    {
      return $this->roles->pluck('name')->contains($role);
    }

    public function addRole($name)
    {
      $role = Role::where('name', $name)->first();
      return $this->roles()->save($role);
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

    public function agentsTimeslots()
    {
      return $this->timeslots()->assigned()->scheduled()->get()->sortBy('time');
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
