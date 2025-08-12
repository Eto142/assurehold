<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Escrow extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'dob',
        'phone',
        'street',
        'city',
        'state',
        'zip',
        'country',
        'purpose',
        'other_purpose',
        'transaction_details',
        'connect_escrow_status',
        'transaction_agreement_status',
        'status',
        'agreed',
    ];

    // (Optional) Relationship to User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
