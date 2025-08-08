<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PaymentProof;
use Illuminate\Support\Facades\Auth;

class PaymentProofController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'payment_proof' => 'required|file|mimes:jpg,jpeg,png,pdf|max:5120',
        ]);

        $filePath = $request->file('payment_proof')->store('payment_proofs', 'public');

        PaymentProof::create([
            'user_id' => Auth::id(),
            'file_path' => $filePath,
        ]);

        return back()->with('success', 'Payment proof uploaded successfully.');
    }
}
