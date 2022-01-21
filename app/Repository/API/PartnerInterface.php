<?php

namespace App\Repository\API;

interface PartnerInterface
{

    public function basicInfo($id);

    public function vehicleInfo($id);

    public function tripHistory($id);

    public function updatePartnerDocument($data,$id);

    public function getDocumentsByPartner($id);


}