<?php


namespace App\Http\Controllers;

use App\Timeslot;

use App\Http\Requests;

use App\Http\Requests\CreateTimeslotRequest;

use Illuminate\Http\Request;


class TimeslotsController extends Controller
{
  //
  //
  //
  //
  // SHOW ALL TIMESLOTS
  //
  public function index()
  {
    $availableTimeslots = Timeslot::orderBy('time', 'asc')->unassigned()->get();

    $unavailableTimeslots = Timeslot::orderBy('time', 'asc')->assigned()->get();

    return view('timeslots.index', [
      'availableTimeslots' => $availableTimeslots,
      'unavailableTimeslots' => $unavailableTimeslots
    ]);
  }

  //
  //
  //
  //
  // SHOW SELECTED TIMESLOT
  //
  public function show($id)
  {
    $timeslot = Timeslot::findOrFail($id);

    return view('timeslots.show')->with('timeslot', $timeslot);
  }


  //
  //
  //
  //
  // SHOW TIMESLOT CREATION VIEW
  //
  public function create()
  {
    return view('timeslots.create');
  }


  //
  //
  //
  //
  // STORE CREATED TIMESLOT
  //
  public function store(CreateTimeslotRequest $request)
  {

    Timeslot::create($request->all());

    return redirect('timeslots');

  }

  //
  //
  //
  //
  // ASSIGN TIMESLOT
  //
  public function update($id)
  {
    $timeslot = Timeslot::find($id);

    $timeslot->is_assigned = 1;

    $timeslot->save();

    return redirect('timeslots');
  }

}
