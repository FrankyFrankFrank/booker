<?php

namespace App\Http\Controllers;

use Request;

use App\Timeslot;

class TimeslotsController extends Controller
{

  public function index()
  {
    $timeslots = Timeslot::orderBy('time', 'asc')->get();

    return view('timeslots.index')->with('timeslots', $timeslots);
  }

  public function show($id)
  {
    $timeslot = Timeslot::findOrFail($id);

    return view('timeslots.show')->with('timeslot', $timeslot);
  }

  public function create()
  {
    return view('timeslots.create');
  }

  public function store()
  {
    $input = Request::all();

    Timeslot::create($input);

    return redirect('timeslots');
  }

  public function update($id)
  {
    $timeslot = Timeslot::find($id);

    $timeslot->is_assigned = 1;

    $timeslot->save();

    return redirect('timeslots');
  }

}
