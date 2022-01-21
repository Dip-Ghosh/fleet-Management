<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentDetail extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'user_id',
        'account_holder_name',
        'account_number',
        'bank_branch_name',
        'digital_payment_account',
        'digital_payment_number'

    ];
}
