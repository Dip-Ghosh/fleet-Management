<?php

namespace App\Service\ApiService;
use App\Service\ApiService\TripRequestPickupTimeService;
use App\Repository\API\TripRequestPickupTimeInterface;

class TripRequestPickupTimeImplementation implements TripRequestPickupTimeService
{

    private $tripRequestPickupTime;
    public function __construct(TripRequestPickupTimeInterface $tripRequestPickupTime)
    {
        $this->tripRequestPickupTime = $tripRequestPickupTime;
    }

    public function storePickUpTime($request){

       return $this->tripRequestPickupTime->storeTime($request);

    }

    public function updatePickUpTime($request){

       return $this->tripRequestPickupTime->updatePickUpTime($request);

    }
}