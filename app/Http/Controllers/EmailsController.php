<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Mail;

class EmailsController extends Controller
{

  public function assignedConfirmation()
  {
    return 'Assigned Confirmation';
  }

  public function cancelledConfirmation()
  {
    return 'Cancelled Confirmation';
  }


}
