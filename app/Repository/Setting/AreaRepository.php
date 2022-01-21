<?php

namespace App\Repository\Setting;


use App\Models\Location;
use App\Models\Area;



class AreaRepository implements AreaInterface
{


    protected $area;

    public function __construct(Area $area)
    {
        $this->area = $area;
    }

    public function fetchActiveArea($status,$orderBy){

      return $this->area->where('status', '=',$status)
                ->orderBy('name', $orderBy)
                ->get();
    }
    

    public function store(array $data){
        $value = [
           'location_id' => $data['location_id'],
           'name'=>$data['name'],
           'status'=>$data['status']
        ];
        return $this->area->create($value);
    }

    public function delete($id,$status){
       return $this->area->where('id', $id)->update([
            'status'=>$status
        ]);
    }

    public function edit($id){
        return $this->area->where('id', $id)->first();
    }

    public function update(array $data, $id){
        $value = [
            'location_id' => $data['location_id'],
            'name'=>$data['name'],
            'status'=>$data['status']
        ];
        return $this->area->where('id', $id)->update($value);
    }
    public function getCityWiseArea($id){
        return $this->area->where('location_id', $id)->get();
    }

}
