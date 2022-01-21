<?php
namespace App\Service\Settings;
use App\Service\Settings\CallNoteService;
use App\Repository\Setting\CallNoteInterface;

class CallNoteServiceImplementation implements CallNoteService{

    private $callNote;

    public function __construct(CallNoteInterface $callNote)
    {
        $this->callNote = $callNote;
    }

    public function all(){
       return $this->callNote->getAllActiveCallNotes();
    }

    public function store($data){
        return $this->callNote->store($data);
    }

    public function delete($id){
        return $this->callNote->delete($id);
    }

    public function edit($id){
        return $this->callNote->edit($id);
    }

    public function update($data, $id){
        return $this->callNote->update($data,$id);
    }

}