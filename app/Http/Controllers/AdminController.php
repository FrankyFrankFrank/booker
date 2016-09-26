<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Timeslot;

class AdminController extends Controller
{
    public function index()
    {
      $booked = Timeslot::assigned()->get();
      return view('admin.schedule', ['booked' => $booked]);
    }
}
