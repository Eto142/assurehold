<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WithdrawalController extends Controller
{
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

        // Prepare data for result view
        $data = [
            'user'           => Auth::user(),
            'paid_amount'    => $request->paid_amount,
            'payment_method' => $request->payment_method,
            'proof_path'     => $proofPath
        ];

        // Return result page
        return view('user.withdrawal.index', $data);
    }
}
