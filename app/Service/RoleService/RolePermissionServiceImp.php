<?php

namespace App\Service\RoleService;

use  App\Repository\Role\RoleInterface;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Route;
use Shuttle\PhpPack\Classes\Exceptions\ApiDataNotFoundException;

class RolePermissionServiceImp implements RolePermissionService
{
    private $role;

    public function __construct(RoleInterface $role)
    {
        $this->role = $role;

    }

    public function routeList(){

        $getRouteCollection = Route::getRoutes();
        $data = [];
        $headers = [];
        foreach ($getRouteCollection as $route) {
            if(str_contains($route->getName(),'ignition') == false  && str_contains($route->getName(),'passport') == false
                && str_contains($route->getName(),'login') == false && str_contains($route->getName(),'logout') == false
                && str_contains($route->getName(),'v1') == false  ){
                $value = explode ('.', $route->getName());
                array_push($headers,$value[0]);
                array_push($data,$route->getName());

            }
        }

        return [$data,$headers];
    }

    public function roleList(){
        try {
            $http = new Client;
            $userServiceUrl = env('USER_SERVICE_URL');
            $user = $http->get($userServiceUrl . '/roles');
            $jsonData = json_decode((string)$user->getBody(), true);

            $responseData =[];
            foreach($jsonData['data'] as $datum){
                array_push($responseData,$datum['name']);
            }
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

    public function createUserRole($data){
        $existingRole =  $this->role->existingRole($data['role_name']);
        
        if(!empty($existingRole)){
            $this->role->deleteExistingRole($data['role_name']);
        }
        return $this->role->createUserRole($data);

    }
    public function fetchUserAccess($role){
        $userPermissions =$this->role->fetchUserAccess($role);
        if(!empty($userPermissions)){
            return explode("," , $userPermissions->route_name);
        }
        return "message";

    }


    public function fetchUsersByRoleWise($role){
        $token          = Session::get('token');
		$http           = new Client;
        $userServiceUrl = env('USER_SERVICE_URL');
		$urlApi         = $userServiceUrl.'/v1/users/?role='.$role;
		$response       = $http->request('GET', $urlApi, [
                            'headers' => [
                                'Authorization' => $token,
                                'Accept' => 'application/json'
                            ],
                        ]);

        return json_decode($response->getBody(), true);
    }

    public function fetchAllPermissionsByRoleAndUser($data){

        $conditions = array();

		$conditions[] = ['role_name', $data['role_name']];
        $conditions[] = ['user_id', $data['user_id']];
        $conditions[] = ['panel', 'Partner'];

        return $this->role->fetchAllPermissionsByRoleAndUser($conditions);
    }

    public function delete($data){

        $conditions = array();

		$conditions[] = ['role_name', $data['role_name']];
        $conditions[] = ['user_id', $data['user_id']];
        $conditions[] = ['panel', 'Partner'];

        $this->role->delete($conditions);
    }

    public function store($data){

        if (!in_array("admin-dashboard", $data['permissions'])){
            array_push($data['permissions'],"admin-dashboard");
        }

        foreach ($data['permissions'] as $key => $permission) {
            $query[$key]['role_name']   = $data['role_name'];
            $query[$key]['user_id']     = $data['user_id'];
            $query[$key]['route_name']  = $permission;
            $query[$key]['panel']       = 'Partner';
        }

        $this->role->store($query);
    }

}