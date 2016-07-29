<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Autologin;

use App\User;

class AutoLoginGenerator extends Controller
{

  public function generate($id){

    $user = User::find($id);

    $link = Autologin::to($user, '/timeslots');

    return($link);
  }

}
