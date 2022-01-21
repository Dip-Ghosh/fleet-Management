<?php

namespace App\Repository\API;

interface TripRequestPickupTimeInterface
{
    public function storeTime($request);

    public function updatePickUpTime($request);

}