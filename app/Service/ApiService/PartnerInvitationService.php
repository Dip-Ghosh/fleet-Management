<?php

namespace App\Service\ApiService;

interface PartnerInvitationService
{

    public function invitePartner($data,$tripRequest);
    public function viewPartnerTripRequest($id);


}