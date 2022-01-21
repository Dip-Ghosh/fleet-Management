<?php

namespace App\Repository\API;

use App\Repository\API\PartnerInvitationInterface;
use App\Models\TripRequestToPartner;
use Illuminate\Support\Facades\DB;

class PartnerInvitationRepository implements PartnerInvitationInterface
{

    private $tripRequestToPartner;

    public function __construct(TripRequestToPartner $tripRequestToPartner)
    {
        $this->tripRequestToPartner = $tripRequestToPartner;
    }



    public function sendInvitationRequestToPartner($data,$tripRequest){

        
        $existing = DB::table('trip_request_to_partners')->where('trip_request_id',$tripRequest->id)->get();
        if(!empty($existing)){
            return ;
        }
        $value = [];
        foreach ($data['partner_id'] as $partner){
             $value[]=[
                 "trip_request_id"=> $tripRequest->id,
                 "trip_types_id"=> $tripRequest->trip_types_id,
                 "partner_id"=>$partner,
                 "price"=>$tripRequest->price,
                 "working_days"=>$tripRequest->working_days,
                 "week_days"=>$tripRequest->week_days,
                 "trip_per_price"=>$tripRequest->trip_per_price,
                 "bonus"=>$tripRequest->bonus,
                 "distance"=> $tripRequest->distance,
                 "route_name"=>$tripRequest->route_name,
                 "status"=>  "Invited",
                 "instruction_for_tm" =>$tripRequest->instruction_for_tm,
                 "instruction_for_sp" =>$tripRequest->instruction_for_sp
             ];
        }

       return $this->tripRequestToPartner->insert($value);

    }


    public function viewPartnerTripRequest($id){
        
      $data =  $this->partnerTripRequestDetails($id);
      $tripRequest = $this->tripRequest($data['trip_request_id']);
      
      $tripRequestCondition = [];
        $tripRequestPartnerCondition = [];

      if($data['trip_request_id']){
          $tripRequestCondition[] = ['trip_request_id',$data['trip_request_id']];
      }
      if($data['id']){
          $tripRequestPartnerCondition[] = ['tr_request_to_partner_id',$data['id']];
      }

      $pointByTripRequest = $this->findPoints($tripRequestCondition);
      $pointByPartner = $this->findPoints($tripRequestPartnerCondition);
      
      $pickUpByTripRequest = $this->findPickUpTimes($tripRequestCondition);
      $pickUpByPartner = $this-> findPickUpTimes($tripRequestPartnerCondition);
           
     return  [
         "route_name" =>isset($data['route_name']) ?$data['route_name'] : $tripRequest->route_name,
         "distance" =>isset($data['distance']) ?$data['distance'] : $tripRequest->distance,
         "price" =>isset($data['price']) ?$data['price'] : $tripRequest->price,
         "trip_per_price" =>isset($data['trip_per_price']) ?$data['trip_per_price'] : $tripRequest->trip_per_price,
         "bonus" =>isset($data['bonus']) ?$data['bonus'] : $tripRequest->bonus,
         "working_days" =>isset($data['working_days']) ?$data['working_days'] : $tripRequest->working_days,
         "week_days" =>isset($data['week_days']) ?$data['week_days'] : $tripRequest->week_days,
         "tripType" =>isset($data['name']) ?$data['name'] : $tripRequest->name,
         "instruction_for_tm" =>isset($data['instruction_for_tm']) ?$data['instruction_for_tm'] : $tripRequest->instruction_for_tm,
         "instruction_for_sp" =>isset($data['instruction_for_sp']) ?$data['instruction_for_sp'] : $tripRequest->instruction_for_sp,
         "points" => (isset($pointByPartner) && $pointByPartner->isNotEmpty()) ?$pointByPartner : $pointByTripRequest,
         "pickUpTime" =>(isset($pickUpByPartner) && $pickUpByPartner->isNotEmpty()) ?$pickUpByPartner : $pickUpByTripRequest
     ];
   
    }
    
    private function partnerTripRequestDetails($id){

        return  $this->tripRequestToPartner
            ->leftJoin('trip_types','trip_request_to_partners.trip_types_id','=','trip_types.id')
            ->where('trip_request_to_partners.id',$id)
            ->select('trip_types.name','trip_request_to_partners.*')
            ->first();

    }

    private function tripRequest($id){
        return DB::table('trip_requests')
            ->leftJoin('trip_types','trip_requests.trip_types_id','=','trip_types.id')
            ->where('trip_requests.id',$id)
            ->select('trip_types.name','trip_requests.*')
            ->first();
    }

    private function findPoints($condition){
        return  DB::table('points')
            ->where($condition)
            ->select('name','latitude','longitude','type')
            ->get();
    }
    
    private function findPickUpTimes($condition){
        return  DB::table('trip_request_pickup_times')
            ->where($condition)
            ->select('time','type')
            ->get();
    }

}