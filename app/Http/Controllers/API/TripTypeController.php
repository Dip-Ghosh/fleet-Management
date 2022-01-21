<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Service\Settings\TripTypeService;
use Shuttle\PhpPack\Classes\Exceptions\ApiDataNotFoundException;
use Shuttle\PhpPack\Classes\Responses\ApiSuccessResponse;

class TripTypeController extends Controller
{

    /**
     * @param TripTypeService $tripType
     * @return array
     * @throws ApiDataNotFoundException
     */
    public function getTripsType(TripTypeService $tripType)
    {
        try{
            $data = $tripType->all();
            return (new ApiSuccessResponse('Trip Type list', $data))->getPayload();

        } catch (\Exception $e) {
            throw new ApiDataNotFoundException("No Record Found", $e->getMessage());
        }
    }
}
