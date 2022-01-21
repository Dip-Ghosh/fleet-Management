<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller as Controller;
use App\Models\TripRemarksForPartner;
use App\Service\Settings\PresetRemarkService;
use Illuminate\Http\Request;
use Shuttle\PhpPack\Classes\Exceptions\ApiDataNotFoundException;
use Shuttle\PhpPack\Classes\Responses\ApiSuccessResponse;
use Shuttle\PhpPack\Classes\Exceptions\ApiUnauthorizedException;
use App\Service\ApiService\TripRemarksService;

class TripRemarksForPartnerController extends Controller
{
    private $presetRemarkService;
    private $tripRemarksService;

    public function __construct(PresetRemarkService $presetRemarkService,TripRemarksService $tripRemarksService)
    {
       $this->presetRemarkService = $presetRemarkService;
       $this->tripRemarksService = $tripRemarksService;
    }

    /**
     * @return array
     * return the List of Preset remarks.
     */
    public function fetchPredefineRemarks()
    {
        $presetRemarks = $this->presetRemarkService->all();
        return (new ApiSuccessResponse('Preset Remarks.', $presetRemarks))->getPayload();

    }

    /**
     * @param Request $request
     * @param predefined_remarks,Remarks
     */

    public function saveRemark(Request $request){
        try{
            $data =  $this->tripRemarksService->save($request->all());
            return (new ApiSuccessResponse('Trip remarks for partner Inserted.', $data))->getPayload();

        }  catch (\Exception $e) {
            throw new ApiDataNotFoundException("No Record Inserted", $e->getMessage());
        }

    }

    /**
     * @param trip_request_to_partners_id
     * @return array
     * @throws ApiDataNotFoundException
     */
    public function showRemarks($id){

        try{
            $data =  $this->tripRemarksService->showRemarks($id);
            return (new ApiSuccessResponse('Trip remarks for partner List.', $data))->getPayload();

        }  catch (\Exception $e) {
            throw new ApiDataNotFoundException("No Record Inserted", $e->getMessage());
        }
    }

}
