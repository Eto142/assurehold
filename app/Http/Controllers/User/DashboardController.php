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

public function EscrowWalletVerification(){

  return view('user.escrowwallet-verification');
}


public function TransactionAgreement(){

  return view('user.transaction-agreement');
}

public function BankInformation(){

  return view('user.bank-information');
}

public function PayOption(){

  return view('user.pay-option');
}


public function ApprovePayment(){

  return view('user.approve-payment');
}


}
