<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TripRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'trip_per_price',
        'trip_types_id',
        'bonus',
        'trip_code',
        'distance',
        'working_days',
        'week_days',
        'route_name',
        'status',
        'instruction_for_tm',
        'instruction_for_sp'
    ];
}
