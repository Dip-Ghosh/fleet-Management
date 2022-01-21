<?php
namespace App\Repository\Role;
interface RoleInterface
{
    public function createUserRole($data);
    public function existingRole($data);
    public function deleteExistingRole($data);
    public function fetchUserAccess($role);
    public function fetchAllPermissionsByRoleAndUser($conditions);
    public function delete($conditions);
    public function store($data);
}