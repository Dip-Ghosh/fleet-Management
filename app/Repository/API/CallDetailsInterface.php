<?php
namespace App\Repository\API;

interface CallDetailsInterface
{
    public function saveCalledData(array $data);

    public function fetchCallDetails($id);

}
