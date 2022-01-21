<?php
namespace App\Repository\Backend;

interface AdminInterface{

    public function show($data);
    public function edit($id);
    public function editStatus(array $data);
    public function updateUser(array $data, $id);
    public function updateUserInformation(array $data, $id);
    public function updateCarInformation(array $data, $id);
    public function search(array $data);
    public function fetchCarByUserId($userId);




}
