<?php

namespace App\Service\Login;
use GuzzleHttp\Client;
class EmailAndPasswordStrategy
{
    /**
     * @param $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function mobileAndPasswordStrategy($request)
    {

        try {
            $http = new Client;
            $userServiceUrl = env('USER_SERVICE_URL');
            $user = $http->post($userServiceUrl . '/auth', [
                'form_params' => [
                    'strategy' => 'MobileAndPassword',
                    'mobile' => $request['email'],
                    'secret' => $request['password'],
                ],
            ]);
            $responseData = json_decode((string)$user->getBody(), true);


        }
        catch (\Exception $e) {

            $responseData = [
                "success" => false,
                "status-code" => $e->getCode(),
                "message" => $e->getMessage(),
                "user-message" => $e->getMessage()
            ];

        }

         return $responseData;
    }

    /**
     * @param $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function emailAndPasswordStrategy($request)
    {

        try {
            $http = new Client;
            $userServiceUrl = env('USER_SERVICE_URL');
            $user = $http->post($userServiceUrl . '/auth', [
                'form_params' => [
                    'strategy' => 'EmailAndPassword',
                    'mobile' => $request['email'],
                    'secret' => $request['password'],
                ],
            ]);
            $responseData = json_decode((string)$user->getBody(), true);
        }
        catch (\Exception $e) {
            $responseData = [
                "success" => false,
                "status-code" => $e->getCode(),
                "message" => $e->getMessage(),
                "user-message" => $e->getMessage()
            ];
        }

        return $responseData;

    }

}
