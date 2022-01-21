<?php
namespace App\Repository\API;

interface TripRemarksInterface
{

    public function saveRemarksForPartner(array $data);

    public function showRemarks($id);

}
