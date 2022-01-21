<?php

namespace App\Repository\API;

interface TripRequestPointInterface
{
       public function saveTripPoints($request);

       public function updatePoints($data);


}