<?php

namespace App\Service\OtpService;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;
use App\Repository\API\RegisterInterface;
class SmsService
{

    protected $register;
    public function __construct(RegisterInterface $register)
    {
        $this->register = $register;
    }

    /**
     * @param $request
     * @return \GuzzleHttp\Promise\PromiseInterface|\Illuminate\Http\Client\Response
     */
    public function sendSms($request)
    {
        $tripRequestId = $request['trip_request_id'];
        $phoneNumbers = array_combine($request['partner_id'],$request['mobile']);

        $smsUrl = env('SMS_SERVICE_URL');
      
        $api = '/sms/send-sms/';
        $token = env('SMS_SERVICE_TOKEN');
        $smsId = env('SMS_SERVICE_ID');

        return $this->fetchBodyParams($phoneNumbers, $smsUrl, $api, $token, $smsId,$tripRequestId);

    }

    /**
     * @param $phone_numbers
     * @param $message_body
     * @param $url
     * @param $api
     * @param $token
     * @param $smsId
     * @return \GuzzleHttp\Promise\PromiseInterface|\Illuminate\Http\Client\Response
     */
    private function fetchBodyParams($phoneNumbers, $smsUrl, $api, $token, $smsId,$tripRequestId)
    {
          
        $message ="Are you interested in Rental Service\n";
        foreach ($phoneNumbers as $key=>$phone) {
                   $respond = Http::withHeaders(['Accept' => 'Application/JSON'])
                       ->post($smsUrl . $api, [
                           'message_body' => $message. env('APP_URL'). "/" ."invite-partner"."?tr_id=" . $tripRequestId . "&mobile=" .$phone ."&p_id=" .$key,

                           'phone_number' => $phone,
                           'service_id' => $smsId,
                           'service_token' => $token
                       ]);
        }
       
        return $respond;


    }

}