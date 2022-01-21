<?php

namespace App\Repository\Backend;


use App\Models\Car;
use App\Models\User;
use App\Models\UserInfo;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class AdminRepository implements AdminInterface
{
    protected $user;
    protected $userInfo;
    protected $car;

    public function __construct(User $user, UserInfo $userInfo, Car $car)
    {
        $this->user = $user;
        $this->userInfo = $userInfo;
        $this->car = $car;
    }

    public function show($data)
    {
        $userCode = [];
        foreach ($data as $response){
            $userCode[] = $response['user_code'];
        }

        $value = DB::table('user_infos')
            ->leftJoin('locations', 'user_infos.city', '=', 'locations.id')
            ->leftJoin('areas as garage', 'user_infos.garage_location', '=', 'garage.id')
            ->leftJoin('areas as drop', 'user_infos.drop_location', '=', 'drop.id')
            ->leftJoin('cars', 'user_infos.user_id', '=', 'cars.user_id')
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
                'user_infos.number_of_car',
                'user_infos.user_id'
            )
            ->whereIn('user_infos.user_id',  $userCode)
            ->get();

        foreach ($value as $val){
            foreach ($data as $response){
               if($val->user_id == $response['user_code']){
                      $driver[] = (object) array_merge((array)$val,(array)$response);
               }
            }
        }

        return $this->paginate($driver);

}
    public function paginate($items, $perPage = 35, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }
public
function edit($id)
{
    $data = $this->user
        ->where('users.id', '=', $id)
        ->leftJoin('user_infos', 'users.id', '=', 'user_infos.user_id')
        ->leftJoin('locations', 'user_infos.city', '=', 'locations.id')
        ->leftJoin('areas as garage', 'user_infos.garage_location', '=', 'garage.id')
        ->leftJoin('areas as drop', 'user_infos.drop_location', '=', 'drop.id')
        ->leftJoin('cars', 'users.id', '=', 'cars.user_id')
        ->leftJoin('car_brands', 'cars.car_brand', '=', 'car_brands.id')
        ->leftJoin('car_types', 'cars.car_type', '=', 'car_types.id')
        ->leftJoin('car_models', 'cars.car_model', '=', 'car_models.id')
        ->select('users.id',
            'users.name',
            'users.password',
            'users.email',
            'users.mobile',
            'users.status',
            'users.created_at',

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
        )->first();
    return $data;

}


public
function editStatus(array $data)
{
    return $this->user->where('id', '=', $data['id'])->update([
        'status' => $data['status']
    ]);
}

public
function updateUser(array $data, $id)
{

    return $this->user->where('id', $id)->update($data);

}

public
function updateUserInformation(array $data, $id)
{
    return $this->userInfo->where('user_id', $id)->update($data);

}

public
function updateCarInformation(array $data, $id)
{
    return $this->car->where('user_id', $id)->update($data);
}

public
function search(array $data)
{

    $val = $this->user
        ->leftJoin('user_infos', 'users.id', '=', 'user_infos.user_id')
        ->leftJoin('locations', 'user_infos.city', '=', 'locations.id')
        ->leftJoin('areas as garage', 'user_infos.garage_location', '=', 'garage.id')
        ->leftJoin('areas as drop', 'user_infos.drop_location', '=', 'drop.id')
        ->leftJoin('cars', 'users.id', '=', 'cars.user_id')
        ->leftJoin('car_brands', 'cars.car_brand', '=', 'car_brands.id')
        ->leftJoin('car_types', 'cars.car_type', '=', 'car_types.id')
        ->leftJoin('car_models', 'cars.car_model', '=', 'car_models.id')
        ->select(
            'users.id',
            'users.name',
            'users.password',
            'users.email',
            'users.mobile',
            'users.status',

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
        );

    if (isset($data['name']) && !empty($data['name'])) {
        $val->where('users.name', 'like', '%' . $data['name'] . '%');
    }
    if (isset($data['mobile']) && !empty($data['mobile'])) {
        $val->where('users.mobile', '=', $data['mobile']);
    }
    if (isset($data['email']) && !empty($data['email'])) {
        $val->where('users.email', '=', $data['email']);
    }
    if (isset($data['is_ride_sharing_service_included']) && !empty($data['is_ride_sharing_service_included'])) {
        $val->where('user_infos.is_ride_sharing_service_included', '=', $data['is_ride_sharing_service_included']);
    }
    if (isset($data['garage_location']) && !empty($data['garage_location'])) {
        $val->where('user_infos.garage_location', '=', $data['garage_location']);
    }
    if (isset($data['drop_location']) && !empty($data['drop_location'])) {
        $val->where('user_infos.drop_location', '=', $data['drop_location']);
    }
    if (isset($data['car_type']) && !empty($data['car_type'])) {
        $val->where('cars.car_type', '=', $data['car_type']);
    }
    if (isset($data['car_model']) && !empty($data['car_model'])) {
        $val->where('cars.car_model', '=', $data['car_model']);
    }
    if (isset($data['interest_in_rental_service']) && !empty($data['interest_in_rental_service'])) {
        $val->where('cars.interest_in_rental_service', '=', $data['interest_in_rental_service']);
    }
    if (isset($data['partner_type']) && !empty($data['partner_type'])) {
        $val->where('user_infos.partner_type', '=', $data['partner_type']);
    }
    if (isset($data['status']) && !empty($data['status'])) {
        $val->where('users.status', '=', $data['status']);
    }
    $value = $val->paginate(10);

    return $value;
}

public
function fetchCarByUserId($userId)
{
    return $this->car->where('user_id', $userId)->first();
}


}
