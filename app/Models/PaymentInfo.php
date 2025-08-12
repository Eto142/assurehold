<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class PaymentInfo extends Model
{
    
  use HasFactory;

   protected $table = 'payment_informations'; // ✅ fixes the mismatch
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
    'status'
    ];

    // (Optional) Relationship to User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}


