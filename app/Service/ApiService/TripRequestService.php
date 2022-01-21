<?php

namespace App\Service\ApiService;

interface TripRequestService
{
      public function getTripRequests($data);

      public function filterPartner(array $data);

      public function sendPartnerInvitation(array $data);

      public function storeTripRequest(array $data);

      public function showTripRequestData($id);

      public function showPoints($id);

      public function showTripRequestToPickUpTime($id);

      public function invitedPartnerListByTripRequest($id);

      public function countDataStats($id);

      public function findInvitedPartner($data);

      public function updateTripRequestData($data,$id);

     public function updatePartnerResponse($data);

     public function assignedPartners();

     public function updateTripRequestStatus($id,$data);

     public function getUnpublishedTripRequests();


}