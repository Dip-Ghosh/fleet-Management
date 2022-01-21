<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller as Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Shuttle\PhpPack\Classes\Exceptions\ApiDataNotFoundException;
use Shuttle\PhpPack\Classes\Responses\ApiSuccessResponse;
use App\Service\ApiService\TripRequestService;
use App\Service\ApiService\PartnerInvitationService;
use App\Service\OtpService\SmsService;

class TripRequestController extends Controller
{

    private $tripRequestService;
    private $partnerInvitationService;
    private $sms;

    public function __construct(TripRequestService $tripRequestService, PartnerInvitationService $partnerInvitationService, SmsService $sms)
    {
        $this->tripRequestService = $tripRequestService;
        $this->partnerInvitationService = $partnerInvitationService;
        $this->sms = $sms;

    }

    /**
     * @return array
     * @throws ApiDataNotFoundException
     * @param status [ 'Published','Unpublished','Closed']
     * trip request list
     */
    public function index(Request $request)
    {
        try {
            $data = $this->tripRequestService->getTripRequests($request->all());
            return (new ApiSuccessResponse('Trip Request List.', $data))->getPayload();

        } catch (\Exception $e) {
            throw new ApiDataNotFoundException("No Record Found", $e->getMessage());
        }
    }

    /**
     * @param Request $request
     * @param partner_type
     * @param car_type
     * @param car_model
     * @param drop_location
     * @param garage_location
     * @param status
     * @return array
     * @throws ApiDataNotFoundException
     */
    public function searchPartnerBasedOnCriteria(Request $request)
    {
       
        try {
            $data = $this->tripRequestService->filterPartner($request->all());
            return (new ApiSuccessResponse('Filter partner list.', $data))->getPayload();

        } catch (\Exception $e) {
            throw new ApiDataNotFoundException("No Record Found", $e->getMessage());
        }

    }

    /**
     * @param Request $request
     * @param trip_request_id,array of partner_id
     * @return array
     * @throws ApiDataNotFoundException
     */
    public function invitePartner(Request $request)
    {

        try {
            
            $data = $this->tripRequestService->sendPartnerInvitation($request->all());
            $this->sms->sendSms($request->all());
            return (new ApiSuccessResponse('Invitation Send to partner.', $data))->getPayload();

        } catch (\Exception $e) {
            throw new ApiDataNotFoundException("No Record Found", $e->getMessage());
        }
    }


    /**
     * @param Request $request
     * @param distance,
     * @param route_name,
     * @param trip_per_price
     * @param bonus
     * @param working_days
     * @param week_days
     * @param trip_type
     * @param instruction_for_tm
     * @param instruction_for_sp
     * @param instruction_for_sp
     * @param pickUpTime [{@param time, @param type}],
     * @param array points[{@param name, @param latitude,@param longitude,@param type}]
     * @return array
     * @throws ApiDataNotFoundException
     */
    public function store(Request $request)
    {

        try {
            $data = $this->tripRequestService->storeTripRequest($request->all());
            return (new ApiSuccessResponse('Trip Request Created Successfully', $data))->getPayload();

        } catch (\Exception $e) {
            throw new ApiDataNotFoundException("No Record Inserted", $e->getMessage());
        }

    }


    /**
     * @param Request $request
     * @param $id=partner_id
     * @return array
     * @throws ApiDataNotFoundException
     */
    public function update(Request $request, $id)
    {
        try {

            $data = $this->tripRequestService->updateTripRequestData($request->all(), $id);

            return (new ApiSuccessResponse('Update Trip request list', $data))->getPayload();

        } catch (\Exception $e) {
            throw new ApiDataNotFoundException("No Record Inserted", $e->getMessage());
        }

    }

    /**
     * @param $id
     * @return array
     * @throws ApiDataNotFoundException
     */
    public function tripDetails($id)
    {

        try {
            $data['tripRequest'] = $this->tripRequestService->showTripRequestData($id);
            $data['points'] = $this->tripRequestService->showPoints($id);
            $data['pickUpTime'] = $this->tripRequestService->showTripRequestToPickUpTime($id);
            $data['countStats'] = $this->tripRequestService->countDataStats($id);
            $data['invitedPartnerList'] = $this->tripRequestService->invitedPartnerListByTripRequest($id);
            return (new ApiSuccessResponse('Trip Details list', $data))->getPayload();

        } catch (\Exception $e) {
            throw new ApiDataNotFoundException("No Record Inserted", $e->getMessage());
        }


    }

    /**
     * @param Request $request
     * @param status,trip_request_id
     * @return array
     * @throws ApiDataNotFoundException
     */
    public function findInvitedPartnerByStatus(Request $request)
    {
        try {

            $data = $this->tripRequestService->findInvitedPartner($request->all());
            return (new ApiSuccessResponse('Find partner by status', $data))->getPayload();

        } catch (\Exception $e) {

            throw new ApiDataNotFoundException("No Record Inserted", $e->getMessage());
        }
    }

    /**
     * @param $id
     * @return array
     * @throws ApiDataNotFoundException
     */
    public function viewPartnerTripRequestDetails($id)
    {

        try {

            $data = $this->partnerInvitationService->viewPartnerTripRequest($id);
            return (new ApiSuccessResponse('Partner invitation view data', $data))->getPayload();

        } catch (\Exception $e) {

            throw new ApiDataNotFoundException("No Record Inserted", $e->getMessage());
        }

    }


    /**
     * @param Request $request
     * @return array
     * @throws ApiDataNotFoundException
     */
    public function changePartnerStatus(Request $request){
          
        try {
            $data = $this->tripRequestService->updatePartnerResponse($request->all());
            return (new ApiSuccessResponse('Partner is Interested', $data))->getPayload();

        } catch (\Exception $e) {

            throw new ApiDataNotFoundException("Something went wrong.", $e->getMessage());
        }
    }

    /**
     * @return array
     * @throws ApiDataNotFoundException
     */
    public function assignedPartners(){
      
        try {
            $data = $this->tripRequestService->assignedPartners();
            return (new ApiSuccessResponse('Assiged partner List', $data))->getPayload();

        } catch (\Exception $e) {

            throw new ApiDataNotFoundException("Something went wrong.", $e->getMessage());
        }
    }

    /**
     * @param Request $request
     * @param $id
     * @return array
     * @throws ApiDataNotFoundException
     */
    public function updateTripRequestStatus(Request $request,$id){
       
        try {
            $data = $this->tripRequestService->updateTripRequestStatus($id,$request->all());
            return (new ApiSuccessResponse('Trip Request status updated.', $data))->getPayload();
        } catch (\Exception $e) {
            throw new ApiDataNotFoundException("Something went wrong.", $e->getMessage());
        }
    }

    /**
     * @return array
     * @throws ApiDataNotFoundException
     * @Description Give the list of trip requests
     */
    public function getTripRequests(){
        try {
            $data = $this->tripRequestService->getUnpublishedTripRequests();
            return (new ApiSuccessResponse('Trip Request list.', $data))->getPayload();
        } catch (\Exception $e) {
            throw new ApiDataNotFoundException("Something went wrong.", $e->getMessage());
        }
    }


}
