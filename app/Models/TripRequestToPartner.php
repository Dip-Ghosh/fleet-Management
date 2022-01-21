<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TripRequestToPartner extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'trip_request_id',
        'trip_types_id',
        'partner_id',
        'price',
        'trip_per_price',
        'bonus',
        'distance',
        'working_days',
        'route_name',
        'status',
        'instruction_for_tm',
        'instruction_for_sp',
    ];

}
