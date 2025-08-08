<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paymentinformation extends Model
{
    use HasFactory;

    protected $fillable = [
    'user_id',
    'full_legal_name',
    'govt_id',
    'address',
    'city',
    'state',
    'zip',
    'country',
    'bank_name',
    'account_number',
    'routing_number',
    'swift_code',
    'bank_address',
    ];

    // (Optional) Relationship to User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
