<?php


namespace App\Repository\API;

use App\Models\CallDetails;
use App\Repository\API\CallDetailsInterface;
use Illuminate\Support\Facades\DB;

class CallDetailsRepository implements CallDetailsInterface
{

    protected $callDetails;

    public function __construct(CallDetails $callDetails)
    {
        $this->callDetails = $callDetails;
    }

    public function saveCalledData(array $data)
    {
        $value = [
            'partner_id'  => $data['partner_id'],
            'called_by'   =>isset( $data['called_by'])? $data['called_by']: $data['user'],
            'tr_request_to_partner_id' => $data['tr_request_to_partner_id'],
            'call_notes_id' => $data['call_notes_id']
        ];
        
      return $this->callDetails->create($value);
    }

    public function fetchCallDetails($id){

        return  $this->callDetails
                ->where('call_details.tr_request_to_partner_id',$id)
                ->select('call_notes.call_note_type','call_details.id','call_details.called_by',DB::raw("DATE_FORMAT(call_details.created_at, '%Y-%m-%d') as call_date"))
                ->leftJoin('call_notes', 'call_details.call_notes_id','=','call_notes.id')
                ->orderBy('call_details.id', 'desc')
                ->get();
        
    }

}
