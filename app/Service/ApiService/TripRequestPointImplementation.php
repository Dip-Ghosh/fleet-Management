<?php

namespace App\Service\ApiService;

use App\Service\ApiService\TripRequestPointService;
use App\Repository\API\TripRequestPointInterface;

class TripRequestPointImplementation implements TripRequestPointService
{
    private $tripRequestPoint;

    public function __construct(TripRequestPointInterface $tripRequestPoint)
    {

        $this->tripRequestPoint = $tripRequestPoint;
    }

    public function savePoint($request)
    {

        return $this->tripRequestPoint->saveTripPoints($request);

    }

    public function updatePoints($data)
    {
       return $this->tripRequestPoint->updatePoints($data);
    }



}