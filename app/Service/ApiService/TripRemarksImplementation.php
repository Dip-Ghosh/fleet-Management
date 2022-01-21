<?php
namespace App\Service\ApiService;
use App\Repository\API\TripRemarksInterface;


class TripRemarksImplementation implements TripRemarksService{

    private $tripRemarks;

    public function __construct(TripRemarksInterface $tripRemarks)
    {
        $this->tripRemarks = $tripRemarks;
    }

    public function save(array $data){

      return  $this->tripRemarks->saveRemarksForPartner($data);
    }
    public function showRemarks($id){
        return  $this->tripRemarks->showRemarks($id);
    }
}