<?php

namespace App\Service\GraphService;

interface GraphService
{
    public function getUserCount();

    public function getPlaceWiseUser();
    public function getPartnerType();
    public function rideShareIncluded();
    public function isOwner();
    public function drivenBy();
    public function interestedInRental();

}