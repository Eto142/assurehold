<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Escrow;
use Illuminate\Http\Request;

class ManageEscrowController extends Controller
{
    //
    public function approve($id)
{
    $escrow = Escrow::findOrFail($id);
    $escrow->status = 1;
    $escrow->save();

    return redirect()->back()->with('success', 'Escrow verification approved.');
}

public function decline($id)
{
    $escrow = Escrow::findOrFail($id);
    $escrow->status = 2;
    $escrow->save();

    return redirect()->back()->with('error', 'Escrow verification declined.');
}

}
