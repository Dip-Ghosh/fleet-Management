<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TripRemarksForPartner extends Model
{
    use HasFactory;

    protected $fillable = [
        'tr_request_to_partner_id',
        'preset_remark_id',
        'remarks',
        'remarked_by'
    ];
}
