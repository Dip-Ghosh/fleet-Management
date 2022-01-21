<?php


namespace App\Repository\API;


use App\Models\Car;
use App\Models\CarType;
use App\Models\Location;
use App\Models\User;
use App\Models\Area;
use App\Models\UserInfo;
use App\Repository\API\RegisterInterface;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class RegisterRepository implements RegisterInterface
{
    protected $user;
    protected $userInfo;
    protected $car;

    public function __construct(User $user,UserInfo $userInfo,Car $car)
    {
        $this->user = $user;
        $this->userInfo = $userInfo;
        $this->car = $car;
    }
    public function saveUserBasicData(array $data)
    {
       return $this->user->create([
            'name' => $data['name'],
            'email' => $data['email'],
            'mobile' => $data['mobile'],
            'password' => bcrypt($data['password']),
           'created_at'=>Carbon::now()
        ]);
    }

    public function saveUserInfoData(array $data)
    {
        return $this->userInfo->create([
            'user_id' => $data['user_id'],
            'partner_type' => $data['partner_type'],
            'city' => $data['city'],
        ]);
    }

    public function getUserBYId($id){
        return $this->user->where('id', $id)->first();
    }

    public function getUserInfoBYUserId($id){
        
      return $this->userInfo->where('user_id', $id)->first();
    }

    public function saveUserAdditionalInfoData(array $data)
    {
        $this->userInfo->where('user_id', $data['user_id'])->update($data);
        return $this->userInfo->where('user_id', $data['user_id'])->first();
    }

    public function saveCarInformationData(array $data)
    {
        return  $this->car->create($data);
    }

    public function updateCarInformationData(array $data)
    {
        return $this->car->where('id', $data['id'])->update($data);
    }

    public function getImageStatus($id){

        return $this->car->where('id',$id)
                ->select('registration_number','fitness_certificate','tax_token','insurance_paper','car_image','driving_license')
                ->get();
    }

    public function checkUserExistence($mobile){

        return $this->user->where('mobile', $mobile)->exists();
    }

    public function resetPassword($data){

       return $this->user->where('mobile', $data['mobile'])->update([
            'password' => bcrypt( $data['password'])
        ]);
    }

    public function getCarInformation($data){

        return $this->car->where('user_id', $data)->first();
    }

    public function fetchCarByCarId($id){
        return $this->car->where('id', $id)->count();
    }

    public function getPartner($id){
        return $this->user->whereIn('id', $id)->get();
    }
}
