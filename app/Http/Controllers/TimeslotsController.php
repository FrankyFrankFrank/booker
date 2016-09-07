<?php


namespace App\Http\Controllers;


use Mail;

use App\User;

use App\Timeslot;

use App\Http\Requests;

use App\Http\Requests\TimeslotRequest;

use App\Http\Requests\TimeslotAssignRequest;

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

    if (auth()->user()->visiting()->first())
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

    if (auth()->user()->hasRole('Agent'))
    {

      $allAgentNames = User::whereHas('roles', function ($q) {
        $q->where('name', '=', 'Agent');
      })->pluck('name','name');

      return view('timeslots.create', ['agents' => $allAgentNames ]);
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


    $agent = User::find($request->agent_id);
    $agent->timeslots()->save($timeslot);

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

    if (auth()->user()->hasRole('Admin' || 'Agent'))
    {
      $timeslot = Timeslot::findorFail($id);

      $timeslot->delete();
    }

    return redirect('timeslots');

  }

  // ASSIGN TIMESLOT

  public function assign($id, TimeslotAssignRequest $request)
  {

    $timeslot = Timeslot::find($id);

    $user = auth()->user();

    $timeslot->assign($user, $timeslot);

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
    if (auth()->user()->hasRole('Agent'))
    {
      $agent = auth()->user();

      $scheduled = $agent->agentsTimeslots()->sortBy('time');

      return view('timeslots.schedule', ['scheduled' => $scheduled]);
    }
    else
    {
      return view('welcome');
    }

  }


  // VIEW VISITOR TIMESLOT

  public function viewVisitorTimeslot()
  {
    $timeslot = auth()->user()->visiting()->first();
    return view('timeslots.yourtimeslot', ['timeslot' => $timeslot]);
  }

}
