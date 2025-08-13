<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Escrow;
use App\Models\PaymentInfo;
use App\Models\PaymentProof;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Withdrawal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ManageUserController extends Controller
{
    public function ManageUsers()
    {
        $users = User::paginate(10);
        
        if (request()->ajax()) {
            return response()->json([
                'html' => view('admin.partials.users_table', ['users' => $users])->render(),
                'pagination' => $users->links()->render()
            ]);
        }
        
        return view('admin.manage_users', ['users' => $users]);
    }

    public function ShowUsers () {

        return view('admin.user_data');
    }





    public function userProfile($id)
{
    $user = DB::table('users')->where('id', $id)->first();

    $data = [
        'userProfile'       => $user,
        'escrow_verification_details' => Escrow::where('user_id', $id)
                                    ->orderBy('id', 'desc')
                                    ->get(),

        'user_payment' => PaymentInfo::where('user_id', $id)
                                    ->orderBy('id', 'desc')
                                    ->get(),

         'user_payment_proof' => PaymentProof::where('user_id', $id)
                                    ->orderBy('id', 'desc')
                                    ->get(),                          


        'user_withdrawal' => Withdrawal::where('user_id', $id)
                                    ->orderBy('id', 'desc')
                                    ->get(),
    ];

    return view('admin.user_data', $data);
}



        public function deleteUser($id)
{
    $user = User::findOrFail($id);
    $user->delete();


        return back()->with('status', 'User deleted successfully');
}




    public function addTransaction(Request $request, $id)
{
    $user = User::findOrFail($id);

    $user->transaction_id = $request->transaction_id;
    $user->transaction_type = $request->transaction_type;
    $user->escrow_amount = $request->escrow_amount;
    $user->service_fee = $request->service_fee;
    $user->total_amount = $request->total_amount;

    $user->save();

    return redirect()->back()->with('success', 'Transaction details updated successfully.');
}


 public function WithdrawalTaxCode(Request $request, $id)
{
    $user = User::findOrFail($id);

    $user->withdrawal_tax_code = $request->withdrawal_tax_code;

    $user->save();

    return redirect()->back()->with('success', 'Withdrawal Tax code updated successfully.');
}


public function WithdrawalStatus(Request $request, $id)
{
    $request->validate([
        'withdrawal_status' => 'required|in:0,1'
    ]);

    $user = User::findOrFail($id);
    $user->withdrawal_status = $request->withdrawal_status;
    $user->save();

    return redirect()->back()->with('success', 'Withdrawal Status updated successfully.');
}



}





