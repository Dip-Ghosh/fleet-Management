<?php

namespace App\Repository\Setting;
use App\Models\TripType;


class TripTypeRepository implements TripTypeInterface
{

    protected $tripType;

    public function __construct(TripType $tripType)
    {
        $this->tripType = $tripType;
    }
    public function getAll(){
      return $this->tripType->whereNull('deleted_at')
          ->orderBy('id', 'desc')
          ->get();
    }

    public function store(array $data){
        $value = [
           'name'=>$data['name']
        ];
        $this->tripType->insert($value);
    }

    public function delete($id){

        $data =$this->tripType->where('id', $id)->first();

		return $data->delete();
    }

    public function edit($id){
        return $this->tripType->where('id', $id)->first();
    }

    public function update(array $data, $id){
        $value = [
            'name'=>$data['name']
         ];
       
         return $this->tripType->find($id)->update($value);
    }

}
