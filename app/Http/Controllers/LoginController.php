<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Shuttle\PhpPack\Traits\ShuttlePhpPackTrait;
use Auth;
use App\Http\Requests\LoginCredentialRequest;
use App\Service\Login\EmailAndPasswordStrategy;
use App\Service\GraphService\GraphService;
use GuzzleHttp\Client;


class LoginController extends Controller
{
    /**
     *
     */
    use ShuttlePhpPackTrait;

    private $adminData;
    private $graphData;

    public function __construct(EmailAndPasswordStrategy $strategy, GraphService $graphData)
    {

        $this->strategy = $strategy;
        $this->graphData = $graphData;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse Json
     */
    public function postLogin(LoginCredentialRequest $request)
    {

        if (is_numeric($request->get('email'))) {
            $user = $this->strategy->mobileAndPasswordStrategy($request);
        } else {
            $user = $this->strategy->emailAndPasswordStrategy($request);
        }
        
        if ($user['status_code'] == Response::HTTP_OK) {
            $getUserDetails = $this->tokenVerify($user["data"]["token"]);

            $request->session()->put('name', $getUserDetails['user']->name);
            $request->session()->put('user_id', $getUserDetails['user']->user_code);
            $request->session()->put('token', $user["data"]["token"]);
            

            Cookie::queue('token', $user["data"]["token"], 3600,null, null, false, false);
            Cookie::queue('user_code', $getUserDetails['user']->user_code, 3600,null, null, false, false);
            Cookie::queue('name', $getUserDetails['user']->name, 3600,null, null, false, false);


            $roles = $this->getRoles();

            session(['roles' => $roles['data']]);
            session(['user_roles' => $getUserDetails['roles']]);

            $allowedPermissionModules = DB::table('role_permissions')->whereIn('role_name', session()->get('user_roles'))
                ->where('user_id', session()->get('user_id'))
                ->where('panel', 'Partner')
                ->pluck('route_name');

            session(['permissions' => $allowedPermissionModules]);

            $userCount = $this->graphData->getUserCount();
            $placeWiseUser = $this->graphData->getPlaceWiseUser();
            $partnerType = $this->graphData->getPartnerType();
            $interestedRental = $this->graphData->interestedInRental();
            $rideShareIncluded = $this->graphData->rideShareIncluded();
            $isOwner = $this->graphData->isOwner();
            $drivenBy = $this->graphData->drivenBy();
            return view('dashboard', compact('userCount', 'drivenBy', 'isOwner', 'placeWiseUser', 'partnerType', 'interestedRental', 'rideShareIncluded'));

        } else {
            return redirect()->back()->withErrors('Please Enter Correct Credentials')->withInput();
        }

    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request)
    {
        if ($request->session()->get('token')) {
            Auth::logout();

        }
        Cookie::queue(Cookie::forget('token'));
        Cookie::queue(Cookie::forget('user_code'));
        Cookie::queue(Cookie::forget('name'));
        return redirect()->route('login');

    }

    public function getRoles()
    {
        $token = session()->get('token');
        $http = new Client;
        $userServiceUrl = env('USER_SERVICE_URL');
        $urlApi = $userServiceUrl . '/roles';
        $response = $http->request('GET', $urlApi, [
            'headers' => [
                'Authorization' => $token,
                'Accept' => 'application/json'
            ],
        ]);

        return json_decode($response->getBody(), true);
    }

}
