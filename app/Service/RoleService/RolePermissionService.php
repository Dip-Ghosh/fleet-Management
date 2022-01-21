<?php
namespace App\Service\RoleService;

interface RolePermissionService{

     public function routeList();
     public function roleList();
     public function createUserRole($data);
     public function fetchUserAccess($role);
     public function fetchUsersByRoleWise($role);
     public function fetchAllPermissionsByRoleAndUser($data);
     public function delete($data);
     public function store($data);
 }