<?php
namespace App\Service\AdminService;

 interface AdminService{


     public function show();

     public function edit($id);

     public function view($id);

     public function editStatus(array $data);

     public function updateUser(array $data, $id);

     public function updateUserInformation(array $data, $id);

     public function updateCarInformation(array $data, $id);
     
     public function search(array $data);

     public function fetchCarByUserId($userId);
 }