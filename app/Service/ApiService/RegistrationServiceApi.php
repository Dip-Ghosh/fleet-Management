<?php
namespace App\Service\ApiService;

interface RegistrationServiceApi
{


    public function saveUserBasicData(array $data);

    public function saveUserInfoData(array $data);

    public function getUserBYId($id);

    public function getUserInfoBYUserId($id);

    public function saveUserAdditionalInfoData(array $data);

    public function saveCarInformationData(array $data);

    public function updateCarInformationData(array $data);

    public function getImageStatus($id);

    public function checkUserExistence($mobile);

    public function resetPassword($data);

    public function getCarInformation($data);

    public function fetchCarByCarId($data);




}