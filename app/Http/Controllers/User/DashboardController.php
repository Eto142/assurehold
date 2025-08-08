<?php

namespace App\Http\Controllers\User;
use App\Models\Deposit;
use App\Models\Escrow;
use App\Models\LoanApplication;;
use App\Models\PaymentInformation;
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

public function EscrowWalletVerification(){

  return view('user.escrowwallet-verification');
}


public function TransactionAgreement(){

  return view('user.transaction-agreement');
}



public function PayOption(){
 
  $escrow = Escrow::where('user_id', Auth::id())->first();
    return view('user.pay-option', compact('escrow'));
  
}


public function ApprovePayment(){

  return view('user.approve-payment');
}

public function Cashout(){

  return view('user.cashout');
}


public function Support(){

  return view('user.support');
}


public function Profile(){

  return view('user.profile');
}






}
