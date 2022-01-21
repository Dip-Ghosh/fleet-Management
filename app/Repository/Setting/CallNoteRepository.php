<?php

namespace App\Repository\Setting;
use App\Models\CallNote;
use App\Repository\Setting\CallNoteInterface;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class CallNoteRepository implements CallNoteInterface
{

    protected $callNote;

    public function __construct(CallNote $callNote)
    {
        $this->callNote = $callNote;
    }
    public function getAllActiveCallNotes(){
      return $this->callNote->whereNull('deleted_at')
          ->orderBy('id', 'desc')
          ->get();
    }

    public function store(array $data){
        $value = [
           'call_note_type'=>$data['call_note_type'],
           'created_by'=> session('name')
        ];
       
       return $this->callNote->insert($value);
    }

    public function delete($id){

        $data =$this->callNote->where('id', $id)->first();

		return $data->delete();
    }

    public function edit($id){
        return $this->callNote->where('id', $id)->first();
    }

    public function update(array $data, $id){
        $value = [
            'call_note_type'=>$data['call_note_type'],
            'updated_by'=> session('name')
        ];
       
         return $this->callNote->find($id)->update($value);
    }

}
