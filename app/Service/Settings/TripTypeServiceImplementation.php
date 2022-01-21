<?php
namespace App\Service\Settings;
use App\Repository\Setting\TripTypeInterface;

class TripTypeServiceImplementation implements TripTypeService{

    private $tripType;

    public function __construct(TripTypeInterface $tripType)
    {
        $this->tripType = $tripType;
    }

    public function all(){
       return $this->tripType->getAll();
    }

    public function store($data){
        return $this->tripType->store($data);
    }

    public function delete($id){
        return $this->tripType->delete($id);
    }

    public function edit($id){
        return $this->tripType->edit($id);
    }

    public function update($data, $id){
        return $this->tripType->update($data,$id);
    }

}