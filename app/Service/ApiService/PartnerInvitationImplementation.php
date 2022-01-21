<?php

namespace App\Service\ApiService;
use App\Service\ApiService\PartnerInvitationService;
use App\Repository\API\PartnerInvitationInterface;


class PartnerInvitationImplementation  implements PartnerInvitationService
{
    private $partnerInvitationService;


    public function __construct(PartnerInvitationInterface $partnerInvitationService)
    {
        $this->partnerInvitationService = $partnerInvitationService;

    }


    public function invitePartner($data,$tripRequest){

        return $this->partnerInvitationService->sendInvitationRequestToPartner($data,$tripRequest);
    }

    public function viewPartnerTripRequest($id){
        return $this->partnerInvitationService->viewPartnerTripRequest($id);
    }
}