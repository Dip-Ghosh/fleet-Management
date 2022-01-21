<?php

namespace App\Repository\Backend;


use App\Models\Car;
use App\Models\User;
use App\Models\UserInfo;
use Illuminate\Support\Facades\DB;

class GraphRepository implements GraphInterface
{

    protected $user;
    protected $userInfo;
    protected $car;

    public function __construct(User $user,UserInfo $userInfo,Car $car)
    {
        $this->user = $user;
        $this->userInfo = $userInfo;
        $this->car = $car;
    }
    public function getUserCount()
    {
        return $this->user->select('status', DB::raw('count(*) as total'))->groupBy('status')->get();

    }


    public function getPlaceWiseUser()
    {
        return  $this->userInfo->with(['Area'])->select('drop_location', DB::raw('count(*) as total'))->groupBy('drop_location')->get();

    }

    public function rideShareIncluded()
    {
        return  $this->userInfo->select('is_ride_sharing_service_included', DB::raw('count(*) as total'))->groupBy('is_ride_sharing_service_included')->get();

    }

    public function isOwner()
    {
        return  $this->userInfo->select('is_owner', DB::raw('count(*) as total'))->groupBy('is_owner')->get();
    }

    public function drivenBy()
    {
        return  $this->userInfo->select('is_driven_by', DB::raw('count(*) as total'))->groupBy('is_driven_by')->get();
    }

    public function getPartnerType()
    {
        return  $this->userInfo->select('partner_type', DB::raw('count(*) as total'))->groupBy('partner_type')->get();

    }

    public function interestedInRental()
    {
        return  $this->car->select('interest_in_rental_service', DB::raw('count(*) as total'))->groupBy('interest_in_rental_service')->get();
    }


}
