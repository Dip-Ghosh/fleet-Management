<?php
namespace App\Repository\Backend;

interface GraphInterface{

    public function getUserCount();
    public function getPlaceWiseUser();
    public function getPartnerType();
    public function rideShareIncluded();
    public function isOwner();
    public function drivenBy();
    public function interestedInRental();



}
