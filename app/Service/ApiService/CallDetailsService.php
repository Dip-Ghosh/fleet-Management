<?php
namespace App\Service\ApiService;

interface CallDetailsService
{
    public function saveCalledDetails(array $data);

    public function fetchCallDetails($id);

}