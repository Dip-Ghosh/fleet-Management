<?php

namespace App\Repository\Setting;
use App\Models\Location;


class LocationRepository implements LocationInterface
{

    protected $location;

    public function __construct(Location $location)
    {
        $this->location = $location;
    }

    public function fetchActiveLocations($status,$orderBy)
    {
      return $this->location->where('status', '=',$status)
          ->orderBy('name', $orderBy)
          ->get();
    }

    public function store(array $data){
        $value = [
           'name'=>$data['name'],
           'status'=>$data['status']
        ];
      return $this->location->create($value);
    }

    public function edit($id){
        return $this->location->where('id', $id)->first();
    }

    public function update(array $data, $id){
        $value = [
            'name'=>$data['name'],
            'status'=>$data['status']
        ];
    return $this->location->where('id', $id)->update($value);
    }

    public function delete($id,$status){
        return $this->location->where('id', $id)->update([
            'status'=> $status
        ]);
    }





}
