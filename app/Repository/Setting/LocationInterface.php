<?php
namespace App\Repository\Setting;

interface LocationInterface{

    public function fetchActiveLocations($status,$orderBy);

    public function store(array $data);

    public function edit($id);

    public function update(array $data, $id);

    public function delete($id,$status);




}
