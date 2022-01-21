<?php

namespace App\Repository\API;

interface TripRequestInterface
{
    public function getTripRequests($condition);

    public function filterPartner(array $conditions);

    public function getTripRequestById($id);

    public function updateTripRequest(array $data);

    public function saveTripRequest($data);

    public function showTripRequestData($id);

    public function showPoints($id);

    public function showTripRequestToPickUpTime($id);

    public function invitedPartnerListByTripRequest($id);

    public function countDataStats($id);

    public function findInvitedPartner($data);

    public function updateTripRequestData(array $data,$id);

    public function updatePartnerResponse($data);

    public function assignedPartners();

    public function updateTripRequestStatus($id,$data);

    public function checkPartnerResponse($data);

    public function getUnpublishedTripRequests();




}