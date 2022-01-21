<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Area;
class UserInfo extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [

        'user_id',
        'city',
        'reference',
        'status',
        'partner_type',
        'company_name',
        'company_location',
        'garage_location',
        'type',
        'is_owner',
        'is_driven_by',
        'is_ride_sharing_service_included',
        'owner_national_id',
        'owner_profile_picture',
        'owner_tin_certificate',
        'number_of_car',
        'drop_location'

    ];

    public function area(){
        return $this->belongsTo(Area::class,'drop_location');
    }

}
