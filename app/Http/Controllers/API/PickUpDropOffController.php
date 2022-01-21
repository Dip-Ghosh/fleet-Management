<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Shuttle\PhpPack\Classes\Exceptions\ApiDataNotFoundException;
use Shuttle\PhpPack\Classes\Responses\ApiSuccessResponse;
use App\Service\Settings\AreaServiceInterface;
class PickUpDropOffController extends Controller
{

    private $area;


    public function __construct(AreaServiceInterface $area)
    {
        $this->area = $area;

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $data = $this->area->all();
            return (new ApiSuccessResponse('PickUp Drop Off location List', $data))->getPayload();

        }  catch (\Exception $e) {
            throw new ApiDataNotFoundException("No Record Inserted", $e->getMessage());
        }

    }
}
