<?php

namespace App\Repository\API;
use App\Repository\API\TripRequestPickupTimeInterface;
use App\Models\TripRequestPickupTime;

class TripRequestPickupTimeRepository  implements TripRequestPickupTimeInterface
{
    private $tripRequestPickupTime;

    public function __construct(TripRequestPickupTime $tripRequestPickupTime)
    {
        $this->tripRequestPickupTime = $tripRequestPickupTime;
    }

    public function storeTime($request){

        $value = [];
        foreach($request['pickUpTime'] as $pickUpTime){
            $value [] = [
                "time"=>$pickUpTime['time'],
                "type"=>$pickUpTime['type'],
                "trip_request_id"=>$request['trip_request_id']
            ] ;
        }
      return  $this->tripRequestPickupTime->insert($value) ;
    }

    public function updatePickUpTime($request){
           
        $value = [];
        $pickUpTime = $this->tripRequestPickupTime->where('tr_request_to_partner_id',$request['trip_request_to_partner_id'])->get()->toArray();

        foreach($request['pickUpTime'] as $pickUpTime){
            $value [] = [
                "time"=>$pickUpTime['time'],
                "type"=>$pickUpTime['type'],
                "tr_request_to_partner_id"=>$request['trip_request_to_partner_id'] ,
                "trip_request_id" => null,
            ] ;
        }
        if(count($pickUpTime) >0){
            $this->tripRequestPickupTime->where('tr_request_to_partner_id',$request['trip_request_to_partner_id'])->delete();
        }


      return  $this->tripRequestPickupTime->insert($value) ;
    }
}