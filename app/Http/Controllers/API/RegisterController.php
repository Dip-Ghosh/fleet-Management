<?php

namespace App\Http\Controllers\API;

use App\Helper\ApiDataRequestHelper;
use App\Http\Controllers\Controller as Controller;
use App\Http\Requests\ValidationRequest;
use App\Models\Car;
use App\Models\PaymentDetail;
use App\Models\Profile;
use App\Models\User;
use App\Models\UserInfo;
use App\Repository\API\RegisterInterface;
use App\Traits\ImageUpload;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Service\ApiService\RegistrationServiceApi;
use App\Service\Settings\AreaServiceInterface;
use Shuttle\PhpPack\Classes\Exceptions\ApiDataNotFoundException;
use Shuttle\PhpPack\Classes\Responses\ApiSuccessResponse;
use Shuttle\PhpPack\Classes\Exceptions\ApiUnauthorizedException;
use App\Resources\UserDataFoundResponse;
use App\Service\Settings\CarModelService;
use App\Service\Settings\CarBrandService;
use App\Service\Settings\CarTypeService;
use App\Service\Settings\LocationServiceInterface;
use App\Http\Requests\ImageValidationRequest;

class RegisterController extends Controller
{

    use ImageUpload;

    private $register;
    private $apiDataRequestHelper;

    /**
     * @param RegistrationServiceApi $register
     */
    public function __construct(RegistrationServiceApi $register, ApiDataRequestHelper $apiDataRequestHelper)
    {
        $this->register = $register;
        $this->apiDataRequestHelper = $apiDataRequestHelper;
    }


    /**
     * Register api
     * @param ValidationRequest name.email,password
     * @return array with token and data
     */
    public function register(ValidationRequest $request)
    {

        if ($this->register->checkUserExistence($request->mobile) === true) {
            throw new ApiDataNotFoundException("Existing User!", "Existing User!");
        }
        try {
            $user = $this->register->saveUserBasicData($request->all());

            $requestData['partner_type'] = $request->partner_type;
            $requestData['user_id'] = $user->id;
            $requestData['city'] = $request->city;

            $this->register->saveUserInfoData($requestData);

            $success['token'] = $user->createToken('MyApp')->accessToken;
            $success['user'] = $this->register->getUserBYId($user->id);
            $success['userInfo'] = $this->register->getUserInfoBYUserId($user->id);
            return (new ApiSuccessResponse('User has been registered successfully.', $success))->getPayload();

        } catch (\Exception $e) {
            throw new ApiDataNotFoundException("No Record Found", $e->getMessage());
        }

    }

    /**
     *  login api
     * @param Request $request - email,password
     * @return array
     */
    public function login(Request $request)
    {
        if (!Auth::attempt(['mobile' => $request->mobile, 'password' => $request->password])) {
            throw new ApiUnauthorizedException();
        }
        $success['token'] = Auth::user()->createToken('MyApp')->accessToken;
        return (new ApiSuccessResponse('User login successfully.', $success))->getPayload();

    }

    /**
     * @param Request $request
     * @return Response with data
     */
    public function saveUserAdditionalInformation(Request $request)
    {

        $user = $request->user();

        if (empty($user)) {
            throw new ApiUnauthorizedException("Unauthorized Exception", "Unauthorized User");
        }

        $FilterData = ['user_id', 'garage_location', 'drop_location', 'is_owner', 'is_driven_by',
            'is_ride_sharing_service_included', 'type', 'company_name', 'company_location',
            'fleet_car_type', 'number_of_car'
        ];

        $userData = $this->apiDataRequestHelper->getRequestBodyParams($request->all(), $FilterData);
        $userData['user_id'] = $user->id;
        $images = $this->apiDataRequestHelper->uploadUserDocuments($request->all(), ['owner_national_id', 'owner_tin_certificate', 'owner_profile_picture']);
        $data = $this->register->saveUserAdditionalInfoData(array_merge($userData, $images));

        $success['userInfo'] = $data;
        return (new ApiSuccessResponse('Data has been updated successfully.', $success))->getPayload();


    }

    /**
     * @param Request $request
     * @return Response with data
     */
    public function saveUserCarInformation(ImageValidationRequest $request)
    {

        $user = $request->user();
        if (empty($user)) {
            throw new ApiUnauthorizedException("Unauthorized Exception", "Unauthorized User");
        }

        $userInfo = $this->apiDataRequestHelper->getRequestBodyParams($request->all(), ['car_type', 'car_brand', 'car_model', 'license_plate_number', 'interest_in_rental_service']);
        $images = $this->apiDataRequestHelper->uploadUserDocuments($request->all(), ['registration_number', 'fitness_certificate', 'tax_token','car_image','driving_license']);
        $data = array_merge($userInfo, $images);

        $carCounts = $this->register->fetchCarByCarId($request->id);

        if ($carCounts > 0) {

            $data['id'] = $request->id;
            $this->register->updateCarInformationData($data);
            $success['car_id'] = $request->id;
            $message = 'Data has been updated successfully.';

        } else {
            $data['user_id'] = $user->id;
            $car = $this->register->saveCarInformationData($data);
            $success['car_id'] = $car->id;
            $message = 'Data has been Inserted successfully.';

        }
        return (new ApiSuccessResponse($message, $success))->getPayload();

    }


    /**
     * @param Request $request -user_id
     * @return mixed
     * @throws ApiUnauthorizedException
     * @this function is not used right now. It's not commented because
     * if further required it can be added.
     */
//    public function accountInformation(Request $request)
//    {
//        $data = [];
//        $user = $request->user();
//        $userId = PaymentDetail::where('user_id', $user->id)->count();
//        if (!empty($user)) {
//
//            if (isset($request->account_holder_name) && !empty($request->account_holder_name)) {
//                $data['account_holder_name'] = $request->account_holder_name;
//            }
//            if (isset($request->account_number) && !empty($request->account_number)) {
//                $data['account_number'] = $request->account_number;
//            }
//            if (isset($request->bank_branch_name) && !empty($request->bank_branch_name)) {
//                $data['bank_branch_name'] = $request->bank_branch_name;
//            }
//            if (isset($request->digital_payment_account) && !empty($request->digital_payment_account)) {
//                $data['digital_payment_account'] = $request->digital_payment_account;
//            }
//            if (isset($request->digital_payment_number) && !empty($request->digital_payment_number)) {
//                $data['digital_payment_number'] = $request->digital_payment_number;
//            }
//
//            if ($userId > 0) {
//                PaymentDetail:: where('user_id', $user->id)->update($data);
//                $success['userInfo'] = $data;
//                return $this->sendResponse($success, 'Data has been updated successfully.');
//            } else {
//                $data['user_id'] = $user->id;
//                PaymentDetail::create($data);
//                $success['profileInfo'] = $data;
//                return $this->sendResponse($success, 'Data has been Inserted successfully.');
//            }
//
//        } else {
//            throw new ApiUnauthorizedException("Unauthorized Exception", "Unauthorized User");
//        }
//
//    }

    /**
     * @return array
     */
    public function fetchCity(LocationServiceInterface $areaService)
    {
        $success['cities'] = $areaService->all();
        return (new ApiSuccessResponse('Cities Data.', $success))->getPayload();

    }

    /**
     * @param Request $request -city_id
     * @return array
     * @throws ApiDataNotFoundException
     */
    public function getCityWiseArea(AreaServiceInterface $areaService, Request $request)
    {
        if (empty($request->city_id)) {
            throw new ApiDataNotFoundException("No Record Found.", "No Record Found");
        }
        $areaData = $areaService->getCityWiseArea($request->city_id);
        $success['locations'] = $areaData;
        return (new ApiSuccessResponse('Locations Data.', $success))->getPayload();

    }

    /**
     * @return array
     */
    public function getCarType(CarTypeService $carTypeService)
    {
        $success['carType'] = $carTypeService->all();
        return (new ApiSuccessResponse('Car Type Data', $success))->getPayload();
    }

    /**
     * @param Request $request - car_type-id
     * @return array
     * @throws ApiDataNotFoundException
     */
    public function getCarBrand(Request $request, CarBrandService $CarBrandService)
    {
        if (empty($request->car_type_id)) {
            throw new ApiDataNotFoundException("No Record Found.", "No Record Found");
        }
        $success['carBrand'] = $CarBrandService->fetchCarTypeWiseCarBrand($request->car_type_id);
        return (new ApiSuccessResponse('Car Brand Data', $success))->getPayload();

    }

    /**
     * @return array
     * @return ApiSuccessResponse
     */
    public function getCarModel(CarModelService $carModel)
    {
        $success['carModel'] = $carModel->all();
        return (new ApiSuccessResponse('Car Model Data', $success))->getPayload();
    }

    /**
     * @param Request $request -car_id
     * @return array
     * @throws ApiUnauthorizedException
     */
    public function getImageInformation(Request $request)
    {
        if (empty($request->car_id)) {
            throw new ApiDataNotFoundException("No Record Found.", "No Record Found");
        }
        $success = $this->register->getImageStatus($request->car_id);
        return (new ApiSuccessResponse('Image Information.', $success))->getPayload();
    }

    /**
     * @return array
     * @return ApiSuccessResponse
     * @throws ApiUnauthorizedException
     */
    public function getProfileInformation()
    {
        if (empty(Auth::user())) {
            throw new ApiUnauthorizedException("Unauthorized Exception", "Unauthorized User");
        }
        $success['user'] = $this->register->getUserBYId(Auth::user()->id);
        $success['userInfo'] = $this->register->getUserInfoBYUserId(Auth::user()->id);
        $success['imageInformation'] = $this->register->getCarInformation(Auth::user()->id);

        return (new ApiSuccessResponse('Successfully.', $success))->getPayload();
    }

    /**
     * @return array
     * @return ApiSuccessResponse
     * @throws ApiUnauthorizedException
     */
    public function logout()
    {
        if (empty(Auth::user())) {
            throw new ApiDataNotFoundException("No Record Found.", "No Record Found");
        }
        Auth::user()->token()->revoke();
        return (new ApiSuccessResponse('Success! You are logged out.'))->getPayload();


    }

}
