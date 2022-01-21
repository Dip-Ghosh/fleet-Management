<?php
namespace App\Repository\Setting;

interface CallNoteInterface{

    public function getAllActiveCallNotes();

    public function store(array $data);

    public function delete($id);

    public function edit($id);

    public function update(array $data, $id);
}
