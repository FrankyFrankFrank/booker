<?php


namespace App\Http\Controllers;


use Mail;

use App\User;

use App\Timeslot;

use App\Http\Requests;

use App\Http\Requests\TimeslotRequest;

use Illuminate\Http\Request;

use Auth;



class TimeslotsController extends Controller
{


  // SHOW ALL TIMESLOTS

  public function groupTimeslotsByDate($timeslots)
  {
    return $timeslots->groupBy('date');
  }

  public function index()
  {

    if (auth()->user()->visiting()->first() != NULL)
    {
      return redirect('/your_timeslot');
    }

    $availableTimeslotsByDay = $this->groupTimeslotsByDate(Timeslot::orderBy('date', 'asc')->orderBy('time', 'asc')->unassigned()->get());

    $unavailableTimeslotsByDay = $this->groupTimeslotsByDate(Timeslot::orderBy('date', 'asc')->orderBy('time', 'asc')->assigned()->get());

    return view('timeslots.index', [
      'availableTimeslotsByDay' => $availableTimeslotsByDay,
      'unavailableTimeslotsByDay' => $unavailableTimeslotsByDay,
    ]);

  }


  // SHOW TIMESLOT CREATION VIEW

  public function create()
  {

    if (auth()->user()->role == 'agent')
    {
      return view('timeslots.create');
    }
    else
    {
      return redirect('timeslots');
    }

  }


  // STORE CREATED TIMESLOT

  public function store(TimeslotRequest $request)
  {

    $timeslot = new Timeslot($request->all());


    auth()->user()->timeslots()->save($timeslot);
    // auth()->user()->timeslots()->save($timeslot);

    return redirect('timeslots');

  }

  // UPDATE TIMESLOT

  public function update($id, TimeslotRequest $request)
  {

    $timeslot = Timeslot::findOrFail($id);

    $timeslot->update($request->all());

    return redirect('timeslots');

  }


  // SHOW SELECTED TIMESLOT

  public function show($id)
  {

    $timeslot = Timeslot::findOrFail($id);

    return view('timeslots.show', ['timeslot' => $timeslot]);

  }


  // SHOW EDIT PAGE

  public function edit($id)
  {

    $timeslot = Timeslot::findOrFail($id);

    return view('timeslots.edit')->with('timeslot', $timeslot);
  }


  // DELETE timeslot

  public function destroy($id)
  {

    $timeslot = Timeslot::findorFail($id);

    $timeslot->delete();

    return redirect('timeslots');

  }

  // ASSIGN TIMESLOT

  public function assign($id)
  {

    $timeslot = Timeslot::find($id);

    $user = auth()->user();

    $timeslot->visitor_id = auth()->user()->id;

    $timeslot->save();


    Mail::send('emails.assigned', ['user' => $user, 'timeslot' => $timeslot], function ($m) use ($user) {
      $m->from('afrank@hawskviewhomes.com', 'Eby Estates');
      $m->to($user->email, $user->name)->subject('Model Home Timeslot Booked');
    });

    return view('timeslots.success')->with('timeslot', $timeslot);

  }

  // UNASSIGN TIMESLOT

  public function unassign($id)
  {

    $timeslot = Timeslot::find($id);

    $user = auth()->user();

    $timeslot->visitor_id = null;

    $timeslot->save();

    Mail::send('emails.unassigned', ['user' => $user, 'timeslot' => $timeslot], function ($m) use ($user) {
      $m->from('afrank@hawskviewhomes.com', 'Eby Estates');
      $m->to($user->email, $user->name)->subject('Model Home Timeslot Cancelled');
    });

    return view('timeslots.cancelled')->with('timeslot', $timeslot);

  }

  // VIEW SCHEDULE

  public function viewSchedule()
  {

    if (auth()->user()->role != 'agent')
    {
      return route('welcome');
    }
    else
    {
      $agent = auth()->user();
      $scheduled = Timeslot::where('agent_id', '=', $agent->id)
        ->assigned()
        ->orderBy('time', 'asc')
        ->get();
      return view('timeslots.schedule', ['scheduled' => $scheduled]);
    }

  }


  // VIEW VISITOR TIMESLOT

  public function viewVisitorTimeslot()
  {
    $timeslot = auth()->user()->visiting()->first();
    return view('timeslots.yourtimeslot', ['timeslot' => $timeslot]);
  }

}
