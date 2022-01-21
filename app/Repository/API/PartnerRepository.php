<?php

namespace App\Repository\API;

use App\Repository\API\PartnerInterface;
use Illuminate\Support\Facades\DB;

class PartnerRepository implements PartnerInterface
{

    public function basicInfo($id)
    {
        return DB::table('users')
            ->leftJoin('user_infos', 'users.id', '=', 'user_infos.user_id')
            ->leftJoin('locations', 'user_infos.city', '=', 'locations.id')
            ->where('users.id', '=', $id)
            ->select(
                'users.id',
                'users.name',
                'users.email',
                'users.mobile',
                'user_infos.type',
                'locations.name as city'
            )->first();
    }

    public function vehicleInfo($id)
    {
        return DB::table('users')
            ->leftJoin('user_infos', 'users.id', '=', 'user_infos.user_id')
            ->leftJoin('locations', 'user_infos.city', '=', 'locations.id')
            ->leftJoin('areas as garage', 'user_infos.garage_location', '=', 'garage.id')
            ->leftJoin('areas as drop', 'user_infos.drop_location', '=', 'drop.id')
            ->leftJoin('cars', 'users.id', '=', 'cars.user_id')
            ->leftJoin('car_brands', 'cars.car_brand', '=', 'car_brands.id')
            ->leftJoin('car_types', 'cars.car_type', '=', 'car_types.id')
            ->leftJoin('car_models', 'cars.car_model', '=', 'car_models.id')
            ->select(
                'car_types.name as car_type',
                'car_brands.name as car_brand',
                'car_models.name as car_model',
                'cars.license_plate_number',
                'cars.registration_number',
                'cars.fitness_certificate',
                'cars.insurance_paper',
                'cars.car_image',
                'cars.tax_token',
                'cars.interest_in_rental_service',
                'cars.driving_license',

                'user_infos.partner_type',
                'locations.name as city',
                'user_infos.type',
                'user_infos.company_name',
                'user_infos.company_location',
                'garage.name as garage_location',
                'drop.name as drop_location',
                'user_infos.is_owner',
                'user_infos.is_driven_by',
                'user_infos.is_ride_sharing_service_included',
                'user_infos.number_of_car'
            )
            ->where('users.id', '=', $id)
            ->first();
    }

    public function tripHistory($id) {
        return DB::table('trip_request_to_partners')
            ->leftJoin('users', 'trip_request_to_partners.partner_id', '=', 'users.id')
            ->leftJoin('trip_types', 'trip_request_to_partners.trip_types_id', '=', 'trip_types.id')
            ->where('users.id', '=', $id)
            ->select(
                 'trip_request_to_partners.id',
                'trip_request_to_partners.route_name',
                'trip_request_to_partners.week_days',
                'trip_types.name'
            )->get();
    }

    public function updatePartnerDocument($data,$id){

       return DB::table('user_infos')->where('user_id',$id)->update($data);
    }

    public function getDocumentsByPartner($id){

       return DB::table('user_infos')
                ->where('user_id',$id)
                ->select('owner_national_id','owner_profile_picture','owner_tin_certificate')
                ->first();
    }


}
