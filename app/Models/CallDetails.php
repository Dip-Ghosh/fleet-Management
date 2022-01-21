<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CallDetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'partner_id',
        'called_by',
        'tr_request_to_partner_id',
        'call_notes_id'
    ];
}
