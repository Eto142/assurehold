<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use App\Models\Escrow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Mail\AttorneyConnectionConfirmationMail;



class EscrowController extends Controller
{
 


//     public function connect(Request $request)
//     {
//         // Validate user input
//         $request->validate([
//             'email' => 'required|email|max:255',
//         ]);

//         $email = $request->input('email');

//         try {
//             // Create or update escrow record for the logged-in user
//             Escrow::updateOrCreate(
//                 ['user_id' => Auth::id()],
//                 [
//                     'email' => $email,
//                     'connect_escrow_status' => 1, // Pending
//                 ]
//             );

//             // Send plain notification to attorney
//            Mail::raw("User with email {$email} wants to connect with an attorney.", function ($message) {
//     $message->to('attorney@assurehold.com')
//             ->from('assurehold@unionsavertbc.cc', 'AssureHold Notifications')
//             ->subject('New Attorney Connection Request');
// });

//             // Send a customized confirmation email to the user
//             $userName = Auth::user()->first_name ?? 'Valued User';
//             Mail::to($email)->send(new AttorneyConnectionConfirmationMail($userName));

//             return back()->with('success', 'Your request has been sent to the attorney, and a confirmation email has been sent to you.');
//         } catch (\Exception $e) {
//             return back()->with('error', 'Something went wrong: ' . $e->getMessage());
//         }
//     }





  public function connect(Request $request)
{
    // Validate the email input
    $request->validate([
        'email' => 'required|email|max:255',
    ]);

    $email = $request->input('email');

    try {
        // Insert or update the escrow record for this user
        $escrow = Escrow::updateOrCreate(
            ['user_id' => Auth::id()],
            [
                'email' => $email,
                'connect_escrow_status' => 1, // pending status
            ]
        );

        // Send email to the attorney
        Mail::raw("User with email {$email} wants to connect with an attorney.", function ($message) {
            $message->to('attorney@assurehold.com')
                    ->subject('New Attorney Connection Request');
        });

        return back()->with('success', 'Your request has been sent to the attorney.');
    } catch (\Exception $e) {
        return back()->with('error', 'Something went wrong: ' . $e->getMessage());
    }
}

public function TransactionAgreement(Request $request)
{
    $request->validate([
        'email' => 'required|email|max:255',
    ]);

    $email = $request->input('email');

    try {
        // Insert or update the escrow record for this user
        Escrow::updateOrCreate(
            ['user_id' => Auth::id()],
            [
                'email' => $email,
                'transaction_agreement_status' => 1, // agreement requested
            ]
        );

        // Send email to the attorney
        Mail::raw("User with email {$email} wants to get a transaction agreement.", function ($message) {
            $message->to('attorney@assurehold.com')
                    ->subject('New Transaction Agreement Request');
        });

        return back()->with('success', 'Your request for a transaction agreement has been sent.');
    } catch (\Exception $e) {
        return back()->with('error', 'Something went wrong: ' . $e->getMessage());
    }
}



public function store(Request $request)
{
    $validated = $request->validate([
        'first_name'           => 'required|string|max:255',
        'last_name'            => 'required|string|max:255',
        'dob'                  => 'required|date',
        'phone'                => 'required|string|max:20',
        'address'              => 'required|string|max:255',
        'city'                 => 'required|string|max:255',
        'state'                => 'required|string|max:100',
        'zip_code'             => 'required|string|max:20',
        'country'              => 'required|string|max:100',
        'purpose'              => 'required|string|max:100',
        'other_purpose'        => 'nullable|string|max:255',
        'transaction_details'  => 'required|string',
    ]);

    try {
        $escrow = Escrow::updateOrCreate(
            ['user_id' => Auth::id()],
            [
                'first_name'          => $validated['first_name'],
                'last_name'           => $validated['last_name'],
                'dob'                 => $validated['dob'],
                'phone'               => $validated['phone'],
                'street'              => $validated['address'],
                'city'                => $validated['city'],
                'state'                => $validated['state'],
                'zip'                 => $validated['zip_code'],
                'country'             => $validated['country'],
                'purpose'             => $validated['purpose'],
                'other_purpose'       => $validated['other_purpose'] ?? null,
                'transaction_details' => $validated['transaction_details'],
                'status'              => 0, // default pending
                'agreed'              => true,
            ]
        );

        return redirect()
            ->route('user.pay.option') // your payment page route
            ->with('escrow_status', $escrow->status)
            ->with('success', 'Your verification has been submitted successfully.');
    } catch (\Exception $e) {
        \Log::error('Verification Submission Error: ' . $e->getMessage());

        return redirect()->back()->with('error', 'There was an error submitting your verification. Please try again.');
    }
}

}










