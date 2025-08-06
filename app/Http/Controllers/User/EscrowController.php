<?php

namespace App\Http\Controllers\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;

class EscrowController extends Controller
{
 

    //connect Escrow
    public function connect(Request $request)
{
    $email = $request->input('email');

    Mail::raw("User with email {$email} wants to connect with an attorney.", function ($message) {
        $message->to('attorney@assurehold.com')
                ->subject('New Attorney Connection Request');
    });

    return back()->with('success', 'Your request has been sent to the attorney.');
}


public function TransactionAgreement(Request $request)
{
    $email = $request->input('email');

    Mail::raw("User with email {$email} wants to connect with an attorney.", function ($message) {
        $message->to('attorney@assurehold.com')
                ->subject('New Attorney Connection Request');
    });

    return back()->with('success', 'Your request has been sent to the attorney.');
}






public function store(Request $request)
{
    $validated = $request->validate([
        'firstName' => 'required|string',
        'lastName' => 'required|string',
        'dob' => 'required|date',
        'phone' => 'required|string',
        'street' => 'required|string',
        'city' => 'required|string',
        'state' => 'required|string',
        'zip' => 'required|string',
        'country' => 'required|string',
        'purpose' => 'required|string',
        'otherPurpose' => 'nullable|string',
        'transactionDetails' => 'required|string',
        'termsAgreement' => 'accepted'
    ]);

    try {
        // First insert with status = 0 (pending)
        $escrow = Escrow::create([
            'first_name' => $validated['firstName'],
            'last_name' => $validated['lastName'],
            'dob' => $validated['dob'],
            'phone' => $validated['phone'],
            'street' => $validated['street'],
            'city' => $validated['city'],
            'state' => $validated['state'],
            'zip' => $validated['zip'],
            'country' => $validated['country'],
            'purpose' => $validated['purpose'],
            'other_purpose' => $validated['otherPurpose'] ?? null,
            'transaction_details' => $validated['transactionDetails'],
            'agreed' => true,
            'status' => 0, // initially pending
        ]);

        // Then update to approved = 1 (if no exception)
        $escrow->update(['status' => 1]);

        return redirect()->back()->with('success', 'Verification approved and stored!');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Submission failed. Please try again.');
    }
}

}






