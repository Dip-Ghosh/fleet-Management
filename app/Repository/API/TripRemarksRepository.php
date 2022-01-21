<?php


namespace App\Repository\API;
use App\Models\TripRemarksForPartner;
use App\Repository\API\RegisterInterface;
use Illuminate\Support\Facades\Auth;

class TripRemarksRepository implements TripRemarksInterface
{
    protected $tripRemarksForPartner;

    public function __construct(TripRemarksForPartner $tripRemarksForPartner)
    {
        $this->tripRemarksForPartner = $tripRemarksForPartner;
    }

    public function saveRemarksForPartner(array $data)
    {
        $value = [
            "tr_request_to_partner_id" => $data["tr_request_to_partner_id"],
            "preset_remark_id"         => $data["preset_remark_id"],
            "remarks"                  => $data["remarks"],
            "remarked_by"              => isset($data['remarked_by'])?$data['remarked_by']:$data['user']
        ] ;

       return $this->tripRemarksForPartner->create($value);
    }
    public function showRemarks($id){

        return $this->tripRemarksForPartner
            ->leftJoin('preset_remarks','trip_remarks_for_partners.preset_remark_id','=','preset_remarks.id')
            ->select('preset_remarks.preset_remark_type','trip_remarks_for_partners.id','trip_remarks_for_partners.remarks','trip_remarks_for_partners.remarked_by')
            ->where('trip_remarks_for_partners.tr_request_to_partner_id',$id)
            ->orderBy('id', 'desc')->get();
    }

}
