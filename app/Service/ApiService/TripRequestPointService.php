<?php

namespace App\Service\ApiService;

interface TripRequestPointService
{
    public function savePoint($request);

    public function updatePoints($data);


}