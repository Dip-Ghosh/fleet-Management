<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\ForgotRequest;
use App\Http\Requests\ResetRequest;
use App\Models\User;
use App\Traits\SendEmail;
use App\Service\OtpService\OtpService;
use App\Service\ApiService\RegistrationServiceApi;
use Shuttle\PhpPack\Classes\Exceptions\ApiDataNotFoundException;
use Shuttle\PhpPack\Classes\Responses\ApiSuccessResponse;

class ForgetPasswordController extends Controller
{
    use SendEmail;

    protected $OtpService;
    protected $registrationServiceApi;

    /**
     * @param OtpService $OtpService
     * @param RegistrationServiceApi $registrationServiceApi
     */
    public function __construct(OtpService $OtpService, RegistrationServiceApi $registrationServiceApi)
    {
        $this->OtpService = $OtpService;
        $this->registrationServiceApi = $registrationServiceApi;
    }

    /**
     * @param ForgotRequest $request
     * @return array
     * @throws ApiDataNotFoundException
     */
    public function sendMobileOtp(ForgotRequest $request)
    {
        if ($this->registrationServiceApi->checkUserExistence($request->mobile) === false) {
            throw new ApiDataNotFoundException("User does not exist." , "User does not exist.");
        }
        try {
            $message = $this->OtpService->sendOtp($request->mobile);
            return (new ApiSuccessResponse('OTP send successfully.', $message))->getPayload();

        } catch (\Exception $exception) {
            throw new ApiDataNotFoundException( $exception->getMessage());
        }
        


    }

    /**
     * @param ResetRequest $request
     * @return array
     */
    public function reset(ResetRequest $request)
    {
        if ($this->OtpService->verifyCode($request->mobile, $request->otp) === false)
        {
            $message = 'Invalid OTP';
        }
        else {
            $this->registrationServiceApi->resetPassword($request);
            $message = 'Password Reset Successfully.';
        }
        return (new ApiSuccessResponse( $message))->getPayload();

    }


}
