<?php
// app/Models/PaymentProof.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PaymentProof extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'file_path',
    ];
}
