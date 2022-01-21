<?php
namespace App\Repository\Setting;

interface AreaInterface{


    public function fetchActiveArea($status,$orderBy);

    public function store(array $data);

    public function delete($id,$status);

    public function edit($id);

    public function update(array $data, $id);

    public function getCityWiseArea($id);




}
