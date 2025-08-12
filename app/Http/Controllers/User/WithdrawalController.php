<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Withdrawal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WithdrawalController extends Controller
{
public function index()
{
    $data = [
        'user'           => session('user'),
        'paid_amount'    => session('paid_amount'),
        'payment_method' => session('payment_method'),
        'proof_path'     => session('proof_path')
    ];

    return view('user.withdrawal.index', $data);
}

            

    public function store(Request $request)
{
    // Validate input
    $request->validate([
        'paid_amount'     => 'required|numeric|min:1',
        'payment_proof'   => 'required|file|mimes:jpg,jpeg,png,pdf|max:5120',
        'payment_method'  => 'required|in:crypto,bank'
    ]);

    // Save uploaded file
    $proofPath = $request->file('payment_proof')->store('payment_proofs', 'public');

    // Flash data to session
    return redirect()
        ->route('user.withdrawal.index')
        ->with([
            'user'           => Auth::user(),
            'paid_amount'    => $request->paid_amount,
            'payment_method' => $request->payment_method,
            'proof_path'     => $proofPath
        ]);
}


    //make withdrawal process

    public function processBank(Request $request)
{
    $request->validate([
        'amount' => 'required|numeric|min:1',
        'bank_name' => 'required|string|max:255',
        'account_name' => 'required|string|max:255',
        'account_number' => 'required|string|max:50',
        'swift_code' => 'nullable|string|max:50',
        'bank_address' => 'required|string|max:255',
    ]);

    $withdrawal = Withdrawal::create([
        'user_id' => Auth::id(),
        'payment_method' => 'bank',
        'amount' => $request->amount,
        'details' => json_encode([
            'bank_name' => $request->bank_name,
            'account_name' => $request->account_name,
            'account_number' => $request->account_number,
            'swift_code' => $request->swift_code,
            'bank_address' => $request->bank_address,
        ]),
        'status' => 0, // pending
    ]);

    return redirect()->route('user.withdrawal.loading', $withdrawal->id);
}


public function processCrypto(Request $request)
{
    $request->validate([
        'amount' => 'required|numeric|min:1',
        'wallet_address' => 'required|string|max:255',
        'network' => 'required|string|max:50',
    ]);

    $withdrawal = Withdrawal::create([
        'user_id' => Auth::id(),
        'payment_method' => 'crypto',
        'amount' => $request->amount,
        'details' => json_encode([
            'wallet_address' => $request->wallet_address,
            'network' => $request->network,
        ]),
        'status' => 0, // pending
    ]);

    return redirect()->route('user.withdrawal.loading', $withdrawal->id);
}

/**
 * Loading Page
 */
public function loading($id)
{
    $withdrawal = Withdrawal::findOrFail($id);

    return view('user.withdrawal.withdrawal-loading', compact('withdrawal'));
}


public function loading2($id)
{
    $withdrawal = Withdrawal::findOrFail($id);

    return view('user.withdrawal.withdrawal-loading2', compact('withdrawal'));
}


/**
 * Tax Fine Page
 */
public function taxFine($id)
{
    $withdrawal = Withdrawal::findOrFail($id);
    return view('user.withdrawal.withdrawal-tax', compact('withdrawal'));
}


public function submitTaxCode(Request $request, $id)
{
    $request->validate([
        'withdrawal_tax_code' => 'required|string|max:50',
    ]);

    // Get the logged-in user's stored tax code
    $userTaxCode = Auth::user()->withdrawal_tax_code;

    if ($request->withdrawal_tax_code !== $userTaxCode) {
        // ❌ Tax code doesn't match the user's stored code
        return back()->withErrors([
            'withdrawal_tax_code' => 'Invalid tax code. Please request the correct code.'
        ]);
    }

    return redirect()->route('user.withdrawal.index')
        ->with('success', 'Tax code verified successfully. Your withdrawal is approved.');
}



}
