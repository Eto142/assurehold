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


    public function verify(Request $request)
    {
        $validated = $request->validate([
            'first_name'         => 'required|string|max:100',
            'last_name'          => 'required|string|max:100',
            'dob'                => 'required|date',
            'phone'              => 'required|string|max:20',
            'street'             => 'required|string|max:255',
            'city'               => 'required|string|max:100',
            'state'              => 'required|string|max:100',
            'zip'                => 'required|string|max:20',
            'country'            => 'required|string|max:100',
            'purpose'            => 'required|string',
            'transaction_details'=> 'required|string',
            'terms_agreement'    => 'accepted',
            'other_purpose'      => 'nullable|string',
        ]);

        $details = collect($validated)->map(function ($val, $key) {
            return ucfirst(str_replace('_', ' ', $key)) . ': ' . $val;
        })->implode("\n");

        Mail::raw("New Escrow Verification Submission:\n\n" . $details, function ($message) {
            $message->to('attorney@assurehold.com')
                    ->subject('New Escrow Wallet Verification Request');
        });

        return back()->with('success', 'Your verification details have been submitted successfully.');
    }
}






