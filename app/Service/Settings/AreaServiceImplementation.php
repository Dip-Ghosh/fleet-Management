<?php
namespace App\Service\Settings;
use App\Repository\Setting\AreaInterface;
class AreaServiceImplementation implements AreaServiceInterface{

    private $area;
    public function __construct(AreaInterface $area)
    {
        $this->area = $area;
    }

    public function all(){
        $status = 'Active';
        $orderBy = 'ASC';
        return $this->area->fetchActiveArea($status,$orderBy);
    }
    

    public function store(array $data){
        return $this->area->store($data);
    }

    public function delete($id){
        $status = 'Inactive';
        return $this->area->delete($id,$status);
    }

    public function edit($id){
        return $this->area->edit($id);
    }

    public function update(array $data, $id){
        return $this->area->update($data,$id);
    }

    public function getCityWiseArea($id){
        return $this->area->getCityWiseArea($id);
    }
}