<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Autologin;

use App\User;

class AutoLoginGenerator extends Controller
{

  public function autoLogins($users)
  {
    $autoLogins = collect([]);

    foreach ($users as $user) {
      $link = Autologin::to($user, '/timeslots');
      $autoLogins->push(['email' => $user->email, 'name' => $user->name, 'link' => $link]);
    }

    return $autoLogins;

  }

  public function generate($id)
  {

    $user = User::find($id);

    $link = Autologin::to($user, '/timeslots');

    return($link);
  }

  public function index()
  {

    $users = User::all();

    $autologins = $this->autoLogins($users);

    return view('autologin.index', ['autologins' => $autologins]);

  }

}
