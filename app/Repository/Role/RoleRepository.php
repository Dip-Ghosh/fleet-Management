<?php
namespace App\Repository\Role;

use App\Models\RolePermission;

class RoleRepository implements RoleInterface
{
    private $model;

    public function __construct(RolePermission $model)
    {
        $this->model = $model;
    }
    public function createUserRole($data){

        $value = [
            'role_name'=>$data['role_name'],
            'route_name'=>implode(",",$data['route_name'])
        ];
    
        return $this->model->create($value);
    }
    public function existingRole($data){
        return $this->model->where('role_name',$data)->first();
    }
    public function deleteExistingRole($data){
        return $this->model->where('role_name',$data)->delete();
    }
    public function fetchUserAccess($role){
         return $this->model->where('role_name',$role)->first();

    }

    public function fetchAllPermissionsByRoleAndUser($conditions){
        return RolePermission::where($conditions)->pluck('route_name');
    }

    public function delete($conditions){
        return RolePermission::where($conditions)->delete();
    }

    public function store($data){
        $this->model::insert($data);
    }
    

}