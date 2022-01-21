<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller as Controller;
use App\Service\Settings\CallNoteService;
use App\Service\ApiService\CallDetailsService;
use Illuminate\Http\Request;
use Shuttle\PhpPack\Classes\Exceptions\ApiDataNotFoundException;
use Shuttle\PhpPack\Classes\Responses\ApiSuccessResponse;
use Shuttle\PhpPack\Classes\Exceptions\ApiUnauthorizedException;

class CallDetailsController extends Controller
{
    private $callNoteService,$callDetailsService;

    public function __construct(CallNoteService $callNoteService,CallDetailsService $callDetailsService)
    {
        $this->callNoteService = $callNoteService;
        $this->callDetailsService = $callDetailsService;
    }

    /**
     * @return array
     */
    public function fetchCallNotes(){
        $callNotes = $this->callNoteService->all();
        return (new ApiSuccessResponse('Call notes List.', $callNotes))->getPayload();
    }

    /**
     * @param Request $request
     * @return array
     * @throws ApiDataNotFoundException
     * @param partner_id,
     * @param called_by
     * @param tr_request_to_partner_id
     * @param call_notes_id
     */

    public function save(Request $request) {

        try{
           $data = $this->callDetailsService->saveCalledDetails($request->all());
            return (new ApiSuccessResponse('Call Details Inserted.', $data))->getPayload();

        }  catch (\Exception $e) {
            throw new ApiDataNotFoundException("No Record Inserted", $e->getMessage());
        }
    }

    /**
     * @return array
     * @throws ApiDataNotFoundException
     * @oaram trip_request_to_partner_id
     * show the list of the call details
     */
    public function index($id){
        try{
        $data = $this->callDetailsService->fetchCallDetails($id);
        return (new ApiSuccessResponse('List of call Details.', $data))->getPayload();
        }  catch (\Exception $e) {
            throw new ApiDataNotFoundException("No Record Found", $e->getMessage());
        }
    }

}
