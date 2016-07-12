<?php


namespace App\Http\Controllers;

use App\Timeslot;

use App\Http\Requests;

use App\Http\Requests\TimeslotRequest;

use Illuminate\Http\Request;

use Auth;


class TimeslotsController extends Controller
{


  // public function __construct()
  // {
  //   $this->middleware('auth');
  // }
  //
  //
  //
  //
  // SHOW ALL TIMESLOTS
  //
  public function index()
  {

    $user = Auth::user();

    $availableTimeslots = Timeslot::orderBy('time', 'asc')->unassigned()->get();

    $unavailableTimeslots = Timeslot::orderBy('time', 'asc')->assigned()->get();

    return view('timeslots.index', [
      'availableTimeslots' => $availableTimeslots,
      'unavailableTimeslots' => $unavailableTimeslots,
      'user' => $user,
    ]);
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
  public function store(TimeslotRequest $request)
  {

    $timeslot = new Timeslot($request->all());

    Auth::user()->timeslots()->save($timeslot);

    return redirect('timeslots');

  }

  //
  //
  //
  //
  // ASSIGN TIMESLOT
  //
  public function assign($id)
  {

    $timeslot = Timeslot::find($id);

    $timeslot->is_assigned = 1;

    $timeslot->save();

    return redirect('timeslots');
  }


  //
  //
  //
  //
  // UPDATE TIMESLOT
  //
  public function update($id, TimeslotRequest $request)
  {

    $timeslot = Timeslot::findOrFail($id);

    $timeslot->update($request->all());

    return redirect('timeslots');
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
  // SHOW EDIT PAGE
  //
  public function edit($id)
  {
    $timeslot = Timeslot::findOrFail($id);

    return view('timeslots.edit')->with('timeslot', $timeslot);
  }

}
