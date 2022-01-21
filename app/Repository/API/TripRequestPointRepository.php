<?php

namespace App\Repository\API;

use App\Repository\API\TripRequestPointInterface;
use App\Models\Point;
use Illuminate\Support\Facades\DB;

class TripRequestPointRepository implements TripRequestPointInterface
{
    private $pointModel;

    public function __construct(Point $pointModel)
    {
        $this->pointModel = $pointModel;
    }

    public function saveTripPoints($request)
    {
        $value = [];
        foreach ($request['points'] as $point) {
            $value[] = [
                "trip_request_id" => $request['trip_request_id'],
                "name" => $point['name'],
                "latitude" => $point['latitude'],
                "longitude" => $point['longitude'],
                "type" => $point['type']
            ];
        }

        return $this->pointModel->insert($value);
    }

    public function updatePoints($data){

       $point = $this->pointModel->where('tr_request_to_partner_id',$data['trip_request_to_partner_id'])->get()->toArray();
        $value = [];
        foreach ($data['points'] as $item) {
            $value[] = [
                "tr_request_to_partner_id" => $data['trip_request_to_partner_id'],
                "trip_request_id" => null,
                "name" => $item['name'],
                "latitude" => $item['latitude'],
                "longitude" => $item['longitude'],
                "type" => $item['type']
            ];
        }
        
       if(count($point)>0){
           $this->pointModel->where('tr_request_to_partner_id',$data['trip_request_to_partner_id'])->delete();
       }
       
        return $this->pointModel->insert($value);
    }


}