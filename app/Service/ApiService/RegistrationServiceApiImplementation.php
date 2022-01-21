<?php
namespace App\Service\ApiService;
use App\Repository\API\RegisterInterface;


class RegistrationServiceApiImplementation implements RegistrationServiceApi{

    private $register;

    public function __construct(RegisterInterface $register)
    {
        $this->register = $register;
    }

    public function saveUserBasicData($data){
        return $this->register->saveUserBasicData($data);
    }

    public function saveUserInfoData($data){
        return $this->register->saveUserInfoData($data);
    }

    public function getUserBYId($id){
        return $this->register->getUserBYId($id);
    }

    public function getUserInfoBYUserId($id){
        return $this->register->getUserInfoBYUserId($id);
    }

    public function saveUserAdditionalInfoData($data){
        return $this->register->saveUserAdditionalInfoData($data);
    }

    public function saveCarInformationData($data){
        return $this->register->saveCarInformationData($data);
    }

    public function updateCarInformationData($data){
        return $this->register->updateCarInformationData($data);
    }

    public function getImageStatus($id){
        return $this->register->getImageStatus($id);
    }


    public function checkUserExistence($mobile){
        return $this->register->checkUserExistence($mobile);
    }

    public function resetPassword($data){
        return $this->register->resetPassword($data);
    }

    public function getCarInformation($data){
        return $this->register->getCarInformation($data);
    }

    public function fetchCarByCarId($data){
        return $this->register->fetchCarByCarId($data);
    }

}