<?php


namespace App\Http\Controllers\User;

use App\Models\Paymentinformation;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class PaymentInformationController extends Controller
{
    //
    public function store(Request $request)
{
    try {
        $request->validate([
            'full_legal_name' => 'required|string|max:255',
            'govt_id' => 'required|string|max:100',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:100',
            'state' => 'required|string|max:100',
            'zip' => 'required|string|max:20',
            'country' => 'required|string|max:100',
            'bank_name' => 'required|string|max:255',
            'account_number' => 'required|string|max:50',
            'routing_number' => 'required|string|max:50',
            'swift_code' => 'required|string|max:50',
            'bank_address' => 'required|string|max:255',
        ]);

        Paymentinformation::create([
            'user_id'         => Auth::id(),
            'full_legal_name' => $request->full_legal_name,
            'govt_id'         => $request->govt_id,
            'address'         => $request->address,
            'city'            => $request->city,
            'state'           => $request->state,
            'zip'             => $request->zip,
            'country'         => $request->country,
            'bank_name'       => $request->bank_name,
            'account_number'  => $request->account_number,
            'routing_number'  => $request->routing_number,
            'swift_code'      => $request->swift_code,
            'bank_address'    => $request->bank_address,
        ]);

        return redirect()->back()->with('success', 'Bank account linked successfully!');
        
    } catch (\Exception $e) {
        \Log::error('Bank Account Submission Error: ' . $e->getMessage());

        return redirect()->back()->with('error', 'There was an error linking your bank account. Please try again.');
    }
}
}
