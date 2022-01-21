<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller as Controller;
use App\Repository\API\PartnerInterface;
use App\Service\ApiService\PartnerService;
use Illuminate\Http\Request;
use Shuttle\PhpPack\Classes\Exceptions\ApiDataNotFoundException;
use Shuttle\PhpPack\Classes\Responses\ApiSuccessResponse;

class PartnerController extends Controller
{

    protected $partner;
    protected $partnerService;
    public function __construct(PartnerInterface $partner,PartnerService $partnerService)
    {
        $this->partner = $partner;
        $this->partnerService = $partnerService;
    }

    /**
     * @param id
     * @return array
     * @throws ApiDataNotFoundException
     * @Description This will give you partner basic info.
     */
    public function getPartner($id){
        try{
            $data['basicInfo']  = $this->partner->basicInfo($id);
            return (new ApiSuccessResponse('Basic  Information.', $data))->getPayload();
        }  catch (\Exception $e) {
            throw new ApiDataNotFoundException("No Record Found", $e->getMessage());
        }
    }

    /**
     * @param id
     * @return array
     * @throws ApiDataNotFoundException
     * @Description  This will give you partner vehicle details.
     */
    public function getVehicle($id){
        try{
            $data['vehicleInfo'] = $this->partner->vehicleInfo($id);
            return (new ApiSuccessResponse('Vehicle Information.', $data))->getPayload();
        }  catch (\Exception $e) {
            throw new ApiDataNotFoundException("No Record Found", $e->getMessage());
        }
    }

    /**
     * @param id
     * @return array
     * @throws ApiDataNotFoundException
     * @Description  This will give you partner trip history.
     */
    public function getTripHistory($id){
        try{
            $data['tripHistory'] = $this->partner->tripHistory($id);
            return (new ApiSuccessResponse('Trip History.', $data))->getPayload();
        }  catch (\Exception $e) {
            throw new ApiDataNotFoundException("No Record Found", $e->getMessage());
        }
    }

    /**
     * @param Request $request
     * @param $id
     * @return array
     * @throws ApiDataNotFoundException
     */
    public function updatePartnerDocument(Request $request,$id){
        try{
            $data['documents'] = $this->partnerService->updatePartnerDocument($request->all(),$id);
            return (new ApiSuccessResponse('Update document successfully.', $data))->getPayload();
        }  catch (\Exception $e) {
            throw new ApiDataNotFoundException("No Record Found", $e->getMessage());
        }
    }

    /**
     * @param $id
     * @return array
     * @throws ApiDataNotFoundException
     * @Description This will give the document information
     */
    public function getDocumentsByPartner($id){
        try{
            $baseUrl = env('APP_URL')."/upload/";
            $documents = $this->partner->getDocumentsByPartner($id);
            $data = [
                "owner_national_id" =>isset($documents->owner_national_id)? $baseUrl.$documents->owner_national_id:null,
                "owner_profile_picture" =>isset($documents->owner_profile_picture)? $baseUrl.$documents->owner_profile_picture:null,
                "owner_tin_certificate" =>isset($documents->owner_tin_certificate)? $baseUrl.$documents->owner_tin_certificate:null
            ];
            return (new ApiSuccessResponse('Document information.', $data))->getPayload();
        }  catch (\Exception $e) {
            throw new ApiDataNotFoundException("No Record Found", $e->getMessage());
        }
    }


//    public function assignedPartners($status){
//        try{
//            $data  =  $this->partnerService->assignedPartners($status);
//            return (new ApiSuccessResponse('Assigned Partners List.', $data))->getPayload();
//        }  catch (\Exception $e) {
//            throw new ApiDataNotFoundException("No Record Inserted", $e->getMessage());
//        }
//
//    }
}
