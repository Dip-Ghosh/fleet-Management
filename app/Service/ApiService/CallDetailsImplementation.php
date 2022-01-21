<?php
namespace App\Service\ApiService;
use App\Repository\API\CallDetailsInterface;
use App\Service\ApiService\CallDetailsService;

class CallDetailsImplementation implements CallDetailsService{

    private $callDetails;

    public function __construct(CallDetailsInterface $callDetails)
    {
        $this->callDetails = $callDetails;
    }

    public function saveCalledDetails(array $data){

       return $this->callDetails->saveCalledData($data);
    }

    public function fetchCallDetails($id){

        return $this->callDetails->fetchCallDetails($id);

    }


}