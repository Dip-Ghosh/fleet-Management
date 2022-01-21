<?php

namespace App\Http\Controllers;

use App\Helper\ApiDataRequestHelper;
use App\Traits\ImageUpload;
use Illuminate\Http\Request;
use App\Http\Requests\ImageValidationRequest;
use App\Service\Settings\AreaServiceInterface;
use App\Service\Settings\LocationServiceInterface;
use App\Service\Settings\CarTypeService;
use App\Service\Settings\CarBrandService;
use App\Service\Settings\CarModelService;
use App\Service\AdminService\AdminService;
use App\Service\GraphService\GraphService;
use Shuttle\PhpPack\Classes\Exceptions\ApiDataNotFoundException;
use Shuttle\PhpPack\Classes\Responses\ApiSuccessResponse;

class AdminController extends Controller
{

    use ImageUpload;

    protected $adminData;
    protected $location;
    protected $carModel;
    protected $carBrand;
    protected $carType;
    protected $area;
    protected $apiDataRequestHelper;

    public function __construct(AdminService    $adminData, LocationServiceInterface $location, CarModelService $carModel, ApiDataRequestHelper $apiDataRequestHelper,
                                CarBrandService $carBrand, CarTypeService $carType, AreaServiceInterface $area)
    {
        $this->adminData = $adminData;
        $this->area = $area;
        $this->location = $location;
        $this->carModel = $carModel;
        $this->carBrand = $carBrand;
        $this->carType = $carType;
        $this->apiDataRequestHelper = $apiDataRequestHelper;
    }

    /**
     * @return dashboard view
     * show different graph and charts
     */
    public function index(GraphService $graphData)
    {
        $userCount = $graphData->getUserCount();
        $placeWiseUser = $graphData->getPlaceWiseUser();
        $partnerType = $graphData->getPartnerType();
        $interestedRental = $graphData->interestedInRental();
        $rideShareIncluded = $graphData->rideShareIncluded();
        $isOwner = $graphData->isOwner();
        $drivenBy = $graphData->drivenBy();
        return view('dashboard', compact('drivenBy', 'isOwner', 'userCount', 'placeWiseUser', 'partnerType', 'interestedRental', 'rideShareIncluded'));
    }

    /**
     * @return partner list view
     * show different type of users
     * with necessary details from users
     * usersinfo cars table
     */
    public function show()
    {
        $data = $this->adminData->show();
        $cities = $this->location->all();
        $locations = $this->area->all();
        $carBrands = $this->carBrand->all();
        $carModels = $this->carModel->all();
        $carTypes = $this->carType->all();

        return view('Partner.list', compact('data', 'carBrands', 'cities', 'locations', 'carModels', 'carTypes'));
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse edit view
     * with neccessary details
     */
    public function edit(Request $request)
    {

        $data = $this->adminData->edit($request->id);
        return (new ApiSuccessResponse('Edit Information.', $data))->getPayload();


    }

    /**
     * @param Request $request
     * @param $id
     * @return array
     */
    public function update(ImageValidationRequest $request)
    {

        $id = $request->id;


        //user table update
        $user = $this->apiDataRequestHelper->getRequestBodyParams($request->all(), ['name', 'mobile', 'email', 'status', 'password']);
        if (!empty($user['password'])) {
            $user['password'] = bcrypt($user['password']);
        }

        //user infos table update
        $filterField = ['city', 'type', 'company_name', 'company_location', 'garage_location', 'drop_location', 'is_owner', 'is_driven_by', 'number_of_car', 'is_ride_sharing_service_included'];
        $userInfo = $this->apiDataRequestHelper->getRequestBodyParams($request->all(), $filterField);

        //car table update
        $imagePath = $this->adminData->fetchCarByUserId($id);
        $cars = $this->apiDataRequestHelper->getRequestBodyParams($request->all(), ['car_type', 'car_brand', 'car_model', 'license_plate_number', 'interest_in_rental_service']);
        $documents = $this->apiDataRequestHelper->deleteAndUploadDocuments($request->all(), ['driving_license', 'registration_number', 'fitness_certificate', 'car_image', 'tax_token'], $imagePath);

        try {
            $this->adminData->updateUser($user, $id);
            $this->adminData->updateUserInformation($userInfo, $id);
            $this->adminData->updateCarInformation(array_merge($cars, $documents), $id);

            return (new ApiSuccessResponse('Successfully Updated.'))->getPayload();
        } catch (\Exception $e) {
            throw new ApiDataNotFoundException("Nothing updated", $e->getMessage());
        }


    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function editStatus(Request $request)
    {
        $this->adminData->editStatus($request->all());
        return (new ApiSuccessResponse('Successfully Updated.'))->getPayload();

    }

    /**
     * @param Request $request
     * @return the searching list
     * with the search data
     */
    public function search(Request $request)
    {
        $requestData = $request->all();
        $data = $this->adminData->search($requestData);
        $locations = $this->area->all();
        $carModels = $this->carModel->all();
        $carTypes = $this->carType->all();
        $cities = $this->location->all();
        $carBrands = $this->carBrand->all();
        return view('Partner.list', compact('data', 'cities', 'requestData', 'carBrands', 'locations', 'carModels', 'carTypes'));
    }

    /**
     * @param location_id
     * @return response
     * get the area data with the given location
     */
    public function getLocationWiseArea(Request $request)
    {
        $locations = $this->area->getCityWiseArea($request->id);
        return (new ApiSuccessResponse('Image Information.', $locations))->getPayload();

    }

}
