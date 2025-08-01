<?php

namespace App\Http\Controllers\User;
use App\Models\Deposit;
use App\Models\LoanApplication;;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    
  //display user dashboard
  public function index()
{

    // Pass loan history to the view
   return view('user.home');



}

 public function ConnectEscrow() 
 {

   return view('user.connect-escrow');
}

}
