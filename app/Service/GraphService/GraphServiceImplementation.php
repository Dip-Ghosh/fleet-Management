<?php

namespace App\Service\GraphService;

use App\Repository\Backend\GraphInterface;


class GraphServiceImplementation implements GraphService
{
    private $graph;

    public function __construct(GraphInterface $graph)
    {
        $this->graph = $graph;

    }

    public function getUserCount()
    {
        $data = $this->graph->getUserCount();

        $getStatusWiseData = [];
        
        foreach($data as $datum){
            if($datum->status == 'Active'){
                $getStatusWiseData['activeUserCount'] =$datum->total??0;
            }
            if($datum->status == 'Inactive'){
                $getStatusWiseData['inActiveUserCount'] =$datum->total??0;
            }
            if($datum->status == 'Pending'){
                $getStatusWiseData['pendingUserCount'] =$datum->total??0 ;
            }
        }

        return $getStatusWiseData ;
    }


    public function getPlaceWiseUser()
    {
        return $this->graph->getPlaceWiseUser();
    }

    public function rideShareIncluded()
    {
        return $this->graph->rideShareIncluded();

    }

    public function isOwner()
    {
        return $this->graph->isOwner();
    }

    public function drivenBy()
    {
        return $this->graph->drivenBy();
    }

    public function getPartnerType()
    {
        return $this->graph->getPartnerType();

    }

    public function interestedInRental()
    {
        return $this->graph->interestedInRental();
    }
}