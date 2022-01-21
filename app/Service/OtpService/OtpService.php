<?php

namespace App\Service\OtpService;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\JsonResponse;
use Shuttle\PhpPack\Classes\Exceptions\ApiInternalServerException;

class OtpService
{

    /**
     * @param $mobile
     * @return JsonResponse|mixed
     * @throws GuzzleException
     */
    public function sendOtp($mobile)
    {
        $client = new Client();
        $url = env('OTP_SERVICE') . '/generate';
        $data['phone'] = $mobile;
        $request = $client->post($url, ['form_params' => $data]);
        return json_decode((string)$request->getBody(), true);
    }

    /**
     * @param $mobile
     * @param $otp
     * @return false|mixed
     * @throws GuzzleException
     */
    public function verifyCode($mobile, $otp)
    {

        $client = new Client();
        $url = env('OTP_SERVICE') . '/verify';
        $data['phone'] = $mobile;
        $data['otp'] = $otp;
        $request = $client->post($url, ['form_params' => $data]);
        $response = json_decode((string)$request->getBody(), true);
        return $response['status'];

    }
}
