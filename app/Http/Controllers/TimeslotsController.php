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

  public function index()
  {

    if (auth()->user()->visiting()->first())
    {
      return redirect('/your_timeslot');
    }

    $availableTimeslotsByDay = Timeslot::availableByDay();

    $unavailableTimeslotsByDay = Timeslot::unavailableByDay();

    return view('timeslots.index', [
      'availableTimeslotsByDay' => $availableTimeslotsByDay,
      'unavailableTimeslotsByDay' => $unavailableTimeslotsByDay,
    ]);

  }


  // SHOW TIMESLOT CREATION VIEW

  public function create()
  {

    if (!auth()->user()->canCreateTimeslots())
    {
      return redirect('timeslots');
    }
    else
    {
      $allAgents = User::agents();
      return view('timeslots.create', ['agents' => $allAgents ]);
    }

  }


  // STORE CREATED TIMESLOT

  public function store(TimeslotRequest $request)
  {
    $timeslot = new Timeslot($request->all());
    $timeslot->save();

    if ($request->input('save_and_create'))
    {
      if(auth()->user()->hasRole('Admin'))
      {
        $allAgents = User::agents();
        return view('timeslots.create', ['timeslot' => $timeslot,
      'agents' => $allAgents]);
      }
      else
      {
        return view('timeslots.create', ['timeslot' => $timeslot]);
      }
    }
    else {
      return redirect('timeslots');
    }

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

      if ($timeslot->visitor_id != null)
      {
        $timeslot->cancel(User::find($timeslot->visitor_id));
      } else {
        $timeslot->delete();
      }
    }

    return redirect('timeslots');

  }

  // ASSIGN TIMESLOT

  public function assign($id, TimeslotAssignRequest $request)
  {

    $timeslot = Timeslot::find($id);

    $visitor = auth()->user();

    if(!$timeslot->visitor_id == null)
    {
      $bookederror = "Another visitor has booked this timeslot already. Please try another timeslot.";
      return redirect('/timeslots')->with('bookederror', $bookederror);
    }

    else
    {
      $visitor->phone = $request->phone;

      $visitor->save();

      $timeslot->assign($visitor);

      return view('timeslots.success')->with('timeslot', $timeslot);
    }

  }

  // UNASSIGN TIMESLOT

  public function unassign($id)
  {

    $timeslot = Timeslot::find($id);

    $visitor = auth()->user();

    $timeslot->cancel($visitor);

    return view('timeslots.cancelled')->with('timeslot', $timeslot);

  }

  // VIEW SCHEDULE

  public function viewSchedule()
  {
    if (auth()->user()->hasRole('Agent'))
    {
      $agent = auth()->user();

      $upcoming = Timeslot::belongsToAgent($agent)->future()->assigned()->get();
      $past = Timeslot::belongsToAgent($agent)->past()->assigned()->get();

      return view('timeslots.schedule', ['upcoming' => $upcoming, 'past' => $past]);
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
    return view('timeslots.yourtimeslot', ['timeslot' => $timeslot, 'cancellable' => $timeslot->canCancel()]);
  }

}
