<?php
namespace App\Service\ApiService;

interface TripRemarksService
{

    public function save(array $data);
    public function showRemarks($id);


}