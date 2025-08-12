<?php


namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PaymentInfo;
use Illuminate\Support\Facades\Auth;

class PaymentInformationController extends Controller
{



   public function BankInformation()
{
    $bankAccounts = PaymentInfo::where('user_id', Auth::id())
        ->orderBy('created_at', 'desc')
        ->get();

    return view('user.bank-information', compact('bankAccounts'));
}



public function store(Request $request)
{
    $request->validate([
        'full_legal_name' => 'required|string|max:255',
        'govt_id'         => 'required|string|max:255',
        'address'         => 'required|string|max:255',
        'city'            => 'required|string|max:255',
        'state'           => 'required|string|max:255',
        'zip'             => 'required|string|max:50',
        'country'         => 'required|string|max:255',
        'bank_name'       => 'required|string|max:255',
        'account_number'  => 'required|string|max:255',
        'routing_number'  => 'required|string|max:255',
        'swift_code'      => 'required|string|max:255',
        'bank_address'    => 'required|string',
    ]);

    PaymentInfo::create(
        $request->only([
            'full_legal_name',
            'govt_id',
            'address',
            'city',
            'state',
            'zip',
            'country',
            'bank_name',
            'account_number',
            'routing_number',
            'swift_code',
            'bank_address',
        ]) +  [
            'user_id' => Auth::id(),
            'status'  => 0, // 0 = Pending, 1 = Approved
        ]
    );

    return redirect()->back()->with('success', 'Bank account linked successfully.');
}

}

