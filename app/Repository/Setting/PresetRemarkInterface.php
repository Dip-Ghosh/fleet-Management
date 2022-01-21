<?php

namespace App\Repository\Setting;

interface PresetRemarkInterface
{
    public function getAllActivePresetRemarks();

    public function store(array $data);

    public function delete($id);

    public function edit($id);

    public function update(array $data, $id);

}