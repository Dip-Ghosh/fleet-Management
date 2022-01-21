<?php
namespace App\Service\Settings;

 interface AreaServiceInterface{

     public function all();

     public function store(array $data);

     public function delete($id);

     public function edit($id);

     public function update(array $data, $id);

     public function getCityWiseArea($id);
 }