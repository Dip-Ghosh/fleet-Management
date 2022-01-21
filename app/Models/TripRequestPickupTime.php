<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TripRequestPickupTime extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'name',
        'trip_request_id',
        'tr_request_to_partner_id',
        'time',
        'type'
    ];
}
