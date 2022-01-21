<?php

namespace App\Repository\API;

use App\Repository\API\TripRequestInterface;
use Illuminate\Support\Facades\DB;
use App\Models\TripRequest;
use App\Helper\Helper;

class TripRequestRepository implements TripRequestInterface
{

    private $tripRequest;

    public function __construct(TripRequest $tripRequest)
    {
        $this->tripRequest = $tripRequest;
    }

    public function getTripRequests($condition)
    {

        return DB::table('trip_requests')
            ->leftJoin('trip_request_to_partners', 'trip_requests.id', '=', 'trip_request_to_partners.trip_request_id')
            ->where($condition)
            ->select('trip_requests.id', 'trip_requests.route_name', 'trip_requests.distance', 'trip_requests.status',
                'trip_requests.trip_code',
                DB::raw("COUNT(trip_request_to_partners.id) as invited"),
                DB::raw("COUNT(CASE  WHEN trip_request_to_partners.status ='Interested'  THEN 1   END) AS interested "),
                DB::raw("COUNT(CASE  WHEN trip_request_to_partners.status ='Confirmed'  THEN 1  END) AS confirmed "),
                DB::raw("COUNT(CASE  WHEN trip_request_to_partners.status ='Assigned'  THEN 1  END) AS assigned ")
            )
            ->orderBy('trip_requests.id', 'DESC')
            ->groupBy('trip_requests.id')
            ->paginate(10);
    }

    public function filterPartner(array $conditions)
    {

        $val = DB::table('users')
            ->leftJoin('user_infos', 'users.id', '=', 'user_infos.user_id')
            ->leftJoin('areas as garage', 'user_infos.garage_location', '=', 'garage.id')
            ->leftJoin('areas as drop', 'user_infos.drop_location', '=', 'drop.id')
            ->leftJoin('cars', 'users.id', '=', 'cars.user_id')
            ->leftJoin('car_types', 'cars.car_type', '=', 'car_types.id')
            ->leftJoin('car_models', 'cars.car_model', '=', 'car_models.id')
            ->select(
                'users.id', 'users.name', 'users.email', 'users.mobile', 'users.status',
                'car_types.name as car_type', 'car_models.name as car_model',
                'user_infos.partner_type', 'garage.name as garage_location', 'drop.name as drop_location', 'user_infos.is_owner'
            );

        if (!empty($conditions["partner_type"])) {
            $val->whereIn("user_infos.partner_type", $conditions["partner_type"]);
        }

        if (!empty($conditions["car_type"])) {
            $val->whereIn("cars.car_type", $conditions["car_type"]);
        }

        if (!empty($conditions["car_model"])) {
            $val->whereIn("cars.car_model", $conditions["car_model"]);
        }

        if (!empty($conditions["drop_location"])) {
            $val->whereIn("user_infos.drop_location", $conditions["drop_location"]);
        }

        if (!empty($conditions["garage_location"])) {
            $val->whereIn("user_infos.garage_location", $conditions["garage_location"]);
        }

        if (!empty($conditions["status"])) {
            $val->whereIn("users.status", $conditions["status"]);
        }

//        return $val->paginate(10);
        return $val->get();

    }

    public function getTripRequestById($id)
    {
        return $this->tripRequest->where('id', $id)->first();

    }

    public function updateTripRequest(array $data)
    {

        return $this->tripRequest->where('id', $data['trip_request_id'])->update(["status" => $data['status']]);

    }

    public function saveTripRequest($data)
    {
        $tripReqCode = Helper::IDGenerator($this->tripRequest, "trip_code", 6, "TR");

        $value = [
            "route_name" => $data['route_name'],
            "trip_code" => $tripReqCode,
            "trip_types_id" => $data["trip_type"],
            "distance" => $data["distance"],
            "working_days" => $data["working_days"],
            "week_days" => $data["week_days"],
            "price" => $data["price"],
            "trip_per_price" => $data["trip_per_price"],
            "bonus" => $data["bonus"],
            "status" => "Unpublished",
            "instruction_for_tm" => $data["instruction_for_tm"],
            "instruction_for_sp" => $data["instruction_for_sp"]
        ];

        return $this->tripRequest::create($value);
    }

    public function showTripRequestData($id)
    {

        return $this->tripRequest->leftJoin('trip_types', 'trip_requests.trip_types_id', '=', 'trip_types.id')
            ->where('trip_requests.id', $id)
            ->select('trip_requests.id', 'trip_requests.route_name', 'trip_types.name as tripType',
                'trip_requests.distance', 'trip_requests.week_days', 'trip_requests.status', 'trip_requests.price', 'trip_requests.bonus',
                'trip_requests.working_days', 'trip_requests.instruction_for_tm', 'trip_requests.instruction_for_sp')
            ->get();

    }

    public function showPoints($id)
    {
        return DB::table('points')
            ->where('trip_request_id', $id)
            ->select('name', 'latitude', 'longitude', 'type')
            ->get();
    }

    public function showTripRequestToPickUpTime($id)
    {
        return DB::table('trip_request_pickup_times')
            ->where('trip_request_id', $id)
            ->select('time', 'type')
            ->get();
    }

    public function invitedPartnerListByTripRequest($id)
    {
        return DB::table('trip_request_to_partners')
            ->leftJoin('users', 'users.id', 'trip_request_to_partners.partner_id')
            ->leftJoin('user_infos', 'users.id', '=', 'user_infos.user_id')
            ->leftJoin('areas', 'user_infos.garage_location', '=', 'areas.id')
            ->leftJoin('cars', 'users.id', '=', 'cars.user_id')
            ->leftJoin('car_types', 'cars.car_type', '=', 'car_types.id')
            ->select('trip_request_to_partners.partner_id', 'users.name', 'users.email', 'users.mobile', 'areas.name as garage_location',
                'users.status as bedge', 'trip_request_to_partners.price', 'trip_request_to_partners.bonus',
                'user_infos.partner_type', 'car_types.name as car_type', 'trip_request_to_partners.status', 'trip_request_to_partners.id',
                DB::raw("(SELECT COUNT(call_details.id) FROM call_details WHERE call_details.tr_request_to_partner_id =trip_request_to_partners.id and call_details.partner_id=trip_request_to_partners.partner_id ) as talked"))
            ->where('trip_request_to_partners.trip_request_id', $id)
            ->paginate(10);

    }

    public function countDataStats($id)
    {
        return DB::table('trip_requests')
            ->leftJoin('trip_request_to_partners', 'trip_requests.id', '=', 'trip_request_to_partners.trip_request_id')
            ->where('trip_requests.id', '=', $id)
            ->select('trip_requests.id', 'trip_requests.route_name',
                DB::raw("(SELECT COUNT(call_details.id)
                 FROM call_details 
                 left join trip_request_to_partners on trip_request_to_partners.id = call_details.tr_request_to_partner_id 
                 and call_details.partner_id=trip_request_to_partners.partner_id where trip_request_to_partners.trip_request_id = $id ) as called"),
                DB::raw("(SELECT	COUNT(DISTINCT(call_details.partner_id))
                 FROM call_details	LEFT JOIN trip_request_to_partners ON trip_request_to_partners.id = call_details.tr_request_to_partner_id
                 AND call_details.partner_id = trip_request_to_partners.partner_id WHERE trip_request_to_partners.trip_request_id = $id) as uniqueCalled"),
                DB::raw("COUNT(trip_request_to_partners.id) as invited"),
                DB::raw("COUNT(CASE  WHEN trip_request_to_partners.status ='Interested' OR trip_request_to_partners.status ='Confirmed' OR trip_request_to_partners.status ='Assigned'  THEN 1  END) AS responded "),
                DB::raw("COUNT(CASE  WHEN trip_request_to_partners.status ='Confirmed'  THEN 1  END) AS confirmed "),
                DB::raw("COUNT(CASE  WHEN trip_request_to_partners.status ='Assigned'  THEN 1  END) AS assigned ")
            )->groupBy('trip_requests.id')->get();

    }

    public function findInvitedPartner($data)
    {

        return DB::table('trip_request_to_partners')
            ->leftJoin('users', 'users.id', 'trip_request_to_partners.partner_id')
            ->leftJoin('user_infos', 'users.id', '=', 'user_infos.user_id')
            ->leftJoin('areas', 'user_infos.garage_location', '=', 'areas.id')
            ->leftJoin('cars', 'users.id', '=', 'cars.user_id')
            ->leftJoin('car_types', 'cars.car_type', '=', 'car_types.id')
            ->select('users.name', 'users.email', 'users.mobile', 'areas.name as garage_location', 'users.status as bedge',
                'trip_request_to_partners.id', 'trip_request_to_partners.partner_id', 'trip_request_to_partners.price', 'trip_request_to_partners.bonus',
                'user_infos.partner_type', 'car_types.name as car_type', 'trip_request_to_partners.status',
                DB::raw("(SELECT COUNT(call_details.id) FROM call_details WHERE call_details.tr_request_to_partner_id =trip_request_to_partners.id and call_details.partner_id=trip_request_to_partners.partner_id ) as talked"))
            ->where($data)
            ->paginate(10);
    }

    public function updateTripRequestData(array $data, $id)
    {

        $partner = DB::table('trip_request_to_partners')
            ->where('partner_id', $id)
            ->where('id', $data['trip_request_to_partner_id'])
            ->first();

        $value = [
            "route_name" => isset($data['route_name']) ? $data['route_name'] : $partner->route_name,
            "trip_types_id" => isset($data["trip_type"]) ? $data["trip_type"] : $partner->trip_types_id,
            "distance" => isset($data["distance"]) ? $data["distance"] : $partner->distance,
            "working_days" => isset($data["working_days"]) ? $data["working_days"] : $partner->working_days,
            "week_days" => isset($data["week_days"]) ? $data["week_days"] : $partner->week_days,
            "price" => isset($data["price"]) ? $data["price"] : $partner->price,
            "trip_per_price" => isset($data["trip_per_price"]) ? $data["trip_per_price"] : $partner->trip_per_price,
            "bonus" => isset($data["bonus"]) ? $data["bonus"] : $partner->bonus,
            "status" => isset($data["status"]) ? $data["status"] : $partner->status,
            "instruction_for_tm" => isset($data["instruction_for_tm"]) ? $data["instruction_for_tm"] : $partner->instruction_for_tm,
            "instruction_for_sp" => isset($data["instruction_for_sp"]) ? $data["instruction_for_sp"] : $partner->instruction_for_sp
        ];

        return DB::table('trip_request_to_partners')
            ->where('partner_id', $id)
            ->where('id', $data['trip_request_to_partner_id'])
            ->update($value);

    }

    public function updatePartnerResponse($data)
    {

        return DB::table('trip_request_to_partners')
            ->where('trip_request_id', $data['trip_request_id'])
            ->where('partner_id', $data['partner_id'])
            ->update(["status" => "Interested"]);
    }

    public function assignedPartners()
    {

        return DB::table('trip_request_to_partners')
            ->leftJoin('users', 'trip_request_to_partners.partner_id', 'users.id')
            ->leftJoin('user_infos', 'users.id', '=', 'user_infos.user_id')
            ->leftJoin('areas', 'user_infos.garage_location', '=', 'areas.id')
            ->leftJoin('cars', 'users.id', '=', 'cars.user_id')
            ->leftJoin('car_types', 'cars.car_type', '=', 'car_types.id')
            ->where('trip_request_to_partners.status', '=', "Assigned")
            ->select('trip_request_to_partners.status', 'users.name', 'users.mobile', 'areas.name as garage_location', 'trip_request_to_partners.id', 'trip_request_to_partners.partner_id',
                'user_infos.partner_type', 'car_types.name as car_type', 'trip_request_to_partners.price', 'trip_request_to_partners.bonus', 'trip_request_to_partners.distance',
                'trip_request_to_partners.week_days', 'trip_request_to_partners.route_name'
            )
            ->orderBy('trip_request_to_partners.status', 'DESC')
            ->orderBy('trip_request_to_partners.id', 'DESC')
            ->paginate(10);

    }

    public function updateTripRequestStatus($id, $data)
    {

        return $this->tripRequest->where('id', $id)->update([
            "status" => $data['status']
        ]);
    }

    public function checkPartnerResponse($data)
    {

        return DB::table('trip_request_to_partners')
            ->where('trip_request_id', $data['trip_request_id'])
            ->where('partner_id', $data['partner_id'])
            ->first();
    }

    public function getUnpublishedTripRequests()
    {

        return $this->tripRequest->where('status', 'Unpublished')->get();
    }
}