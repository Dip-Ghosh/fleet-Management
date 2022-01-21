<?php

namespace App\Repository\Setting;
use App\Repository\Setting\PresetRemarkInterface;
use App\Models\PresetRemark;


class PresetRemarkRepository implements PresetRemarkInterface
{

    protected $presetRemark;

    public function __construct(PresetRemark $presetRemark)
    {
        $this->presetRemark = $presetRemark;
    }
    public function getAllActivePresetRemarks(){
        return $this->presetRemark->whereNull('deleted_at')
            ->orderBy('id', 'desc')
            ->get();
    }

    public function store(array $data){
           
        $value = [
            'preset_remark_type'=>$data['preset_remark_type'],
            'created_by'=>session('name')
        ];
        $this->presetRemark->insert($value);
    }

    public function delete($id){

        return $this->presetRemark->where('id', $id)->delete();
        
    }

    public function edit($id){
        return $this->presetRemark->where('id', $id)->first();
    }

    public function update(array $data, $id){
        $value = [
            'preset_remark_type'=>$data['preset_remark_type'],
            'updated_by'=>session('name')
        ];

        return $this->presetRemark->find($id)->update($value);
    }

}