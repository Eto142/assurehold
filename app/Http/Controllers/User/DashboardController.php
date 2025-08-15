<?php

namespace App\Http\Controllers\User;
use App\Models\Deposit;
use App\Models\Escrow;
use App\Models\PaymentInformation;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    
  //display user dashboard
  public function index()
{

 // Fetch escrow record for the logged-in user
    $escrow = Escrow::where('user_id', Auth::id())->first();

    return view('user.home', compact('escrow'));


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



// public function PayOption(){
 
//   $escrow = Escrow::where('user_id', Auth::id())->first();
//     return view('user.pay-option', compact('escrow'));
  
// }


public function PayOption()
{
    // Existing escrow data for the user
    $escrow = Escrow::where('user_id', Auth::id())->first();

    // Fetch all available wallets set by the admin
    $wallets = Wallet::all(); // returns a collection of wallet objects

    return view('user.pay-option', compact('escrow', 'wallets'));
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



 public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'first_name' => 'required|string|max:50',
            'last_name'  => 'required|string|max:50',
            'phone'      => 'nullable|string|max:20',
        ]);

        $user->update($validated);

        return back()->with('success', 'Profile information updated successfully.');
    }

    /**
     * Update the user's password.
     */
    public function updatePassword(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'current_password'          => 'required|string',
            'new_password'              => 'required|string|min:8|confirmed',
        ]);

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'The current password is incorrect.']);
        }

        $user->update([
            'password' => Hash::make($request->new_password),
        ]);

        return back()->with('success', 'Password updated successfully.');
    }
}






