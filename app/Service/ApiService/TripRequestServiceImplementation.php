<?php

namespace App\Service\ApiService;

use App\Service\ApiService\TripRequestService;
use App\Repository\API\TripRequestInterface;
use App\Helper\ApiDataRequestHelper;
use App\Service\ApiService\PartnerInvitationService;
use App\Service\ApiService\TripRequestPickupTimeService;
use App\Service\ApiService\TripRequestPointService;


class TripRequestServiceImplementation implements TripRequestService
{
    private $tripRequest;
    private $apiDataRequestHelper;
    private $partnerInvitationService;
    private $tripRequestPickupTime;
    private $tripRequestPointService;

    public function __construct(TripRequestInterface     $tripRequest, ApiDataRequestHelper $apiDataRequestHelper,
                                PartnerInvitationService $partnerInvitationService, TripRequestPickupTimeService $tripRequestPickupTime,
                                TripRequestPointService  $tripRequestPointService)
    {
        $this->tripRequest = $tripRequest;
        $this->apiDataRequestHelper = $apiDataRequestHelper;
        $this->partnerInvitationService = $partnerInvitationService;
        $this->tripRequestPickupTime = $tripRequestPickupTime;
        $this->tripRequestPointService = $tripRequestPointService;
    }

    public function getTripRequests($data)
    {
        $condition = [];
        if(!empty($data['status'])){
            $condition[] =['trip_requests.status', $data['status']] ;

        }
        return $this->tripRequest->getTripRequests($condition);
    }

    public function filterPartner(array $data)
    {

        $filterField = ['partner_type', 'car_type', 'car_model', 'drop_location', 'garage_location', 'status'];
        $conditions = $this->apiDataRequestHelper->getSearchRequestParams($data, $filterField);
        
        return $this->tripRequest->filterPartner($conditions);

    }

    public function sendPartnerInvitation(array $data)
    {

        $data['status'] = "Published";
        $getTripRequestById = $this->tripRequest->getTripRequestById($data['trip_request_id']);
        $this->tripRequest->updateTripRequest($data);
        return $this->partnerInvitationService->invitePartner($data, $getTripRequestById);

    }

    public function storeTripRequest(array $data)
    {
        $totalTrip = $this->countTrip($data['working_days']);
        $data["price"] = round($data['trip_per_price'] * $totalTrip *$data['distance']);
        $value['tripRequest'] = $this->tripRequest->saveTripRequest($data);
        $data['trip_request_id'] = $value['tripRequest']->id;
        $this->tripRequestPickupTime->storePickUpTime($data);
        $this->tripRequestPointService->savePoint($data);
        return $value;
    }

    private function countTrip($workingDays)
    {
        if ($workingDays == 5) {
            return 22 * 2;
        }
        if ($workingDays == 6) {
            return 26 * 2;
        }
    }

    public function showTripRequestData($id){

       return $this->tripRequest->showTripRequestData($id);
    }

    public function showPoints($id){
        return $this->tripRequest->showPoints($id);
    }

    public function showTripRequestToPickUpTime($id){
        return $this->tripRequest->showTripRequestToPickUpTime($id);
    }

    public function invitedPartnerListByTripRequest($id){

        return $this->tripRequest->invitedPartnerListByTripRequest($id);
    }

    public function countDataStats($id){

        return $this->tripRequest->countDataStats($id);
    }

    public function findInvitedPartner($data){

        $condition = [];
        if(!empty($data['status'])){
            $condition[] = ['trip_request_to_partners.status', $data['status']];

        }
        $condition[] = ['trip_request_to_partners.trip_request_id', $data['trip_request_id']];
        return $this->tripRequest->findInvitedPartner($condition);
    }

    public function updateTripRequestData($data,$id){

        $tripRequest = [];
        $tripRequest['tripRequest'] = $this->tripRequest->updateTripRequestData($data,$id);

        if(isset($data['points']) && !empty($data['points'])){
            $tripRequest['point'] = $this->tripRequestPointService->updatePoints($data);
        }
        if(isset($data['pickUpTime']) && !empty($data['pickUpTime'])) {
            $tripRequest['pickUp'] = $this->tripRequestPickupTime->updatePickUpTime($data);
        }

        return $tripRequest;
    }

    public function updatePartnerResponse($data){
        $partnerResponse = $this->tripRequest->checkPartnerResponse($data);
       
        if ($partnerResponse->status =="Confirmed" || $partnerResponse->status == "Assigned" || $partnerResponse->status == "Interested") {
             return "Already Responded.";
        }
       return $this->tripRequest->updatePartnerResponse($data);
    }

    public function assignedPartners(){

        return $this->tripRequest->assignedPartners();
    }

    public function updateTripRequestStatus($id,$data){

        return $this->tripRequest->updateTripRequestStatus($id,$data);
    }

    public function getUnpublishedTripRequests(){

        return $this->tripRequest->getUnpublishedTripRequests();
    }


}