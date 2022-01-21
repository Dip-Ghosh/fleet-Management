<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Service\RoleService\RolePermissionService;


class RolePermissionController extends Controller
{
    private $rolePermissionService;

    public function __construct(RolePermissionService $rolePermissionService)
    {
        $this->rolePermissionService  = $rolePermissionService;
    }

    public function index(Request $request)
    {                          
        $roles      = Session::get('roles');
        return view('role-permission.list', compact('roles'));
    }

    public function getUsersByRoleWise(Request $request) {
        $role           = $request->get('role');
        $users          = $this->rolePermissionService->fetchUsersByRoleWise($role);
        
        return response()->json(array('users' => $users));
    }

    public function loadModules(){
        $data       = $this->rolePermissionService->routeList();
        $routes     = array_filter($data[0],'strlen');

        return $routes;
    }

    public function addModules(Request $request){

        $this->rolePermissionService->delete($request->all());

		if(!is_null($request->permissions)){

            $this->rolePermissionService->store($request->all());
		}

        if(session()->get('user_id') == $request->user_id){
            session()->flush();
        }

        return back()->with('success','Modules Updated Successfully');
    }

    public function fetchAllPermissionsByRoleAndUser(Request $request){

        return $this->rolePermissionService->fetchAllPermissionsByRoleAndUser($request->all());

    }
}
