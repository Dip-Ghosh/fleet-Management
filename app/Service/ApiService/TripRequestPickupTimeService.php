<?php

namespace App\Service\ApiService;

interface TripRequestPickupTimeService
{
         public function storePickUpTime($request);

         public function updatePickUpTime($request);

}