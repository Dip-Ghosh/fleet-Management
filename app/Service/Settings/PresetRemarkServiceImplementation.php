<?php
namespace App\Service\Settings;
use App\Service\Settings\PresetRemarkService;
use App\Repository\Setting\PresetRemarkInterface;

class PresetRemarkServiceImplementation implements PresetRemarkService{

    private $presetRemark;

    public function __construct(PresetRemarkInterface $presetRemark)
    {
        $this->presetRemark = $presetRemark;
    }

    public function all(){
       return $this->presetRemark->getAllActivePresetRemarks();
    }

    public function store($data){
        return $this->presetRemark->store($data);
    }

    public function delete($id){
        return $this->presetRemark->delete($id);
    }

    public function edit($id){
        return $this->presetRemark->edit($id);
    }

    public function update($data, $id){
        return $this->presetRemark->update($data,$id);
    }

}