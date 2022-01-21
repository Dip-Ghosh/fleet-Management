<?php

namespace App\Repository\API;

interface PartnerInvitationInterface
{

    public function sendInvitationRequestToPartner($data,$tripRequest);

    public function viewPartnerTripRequest($id);

}