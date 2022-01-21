<?php
namespace App\Service\AdminService;
use App\Repository\Backend\AdminInterface;
use GuzzleHttp\Client;

class AdminServiceImplementation implements AdminService{

    private $adminData;

    public function __construct(AdminInterface $adminData)
    {
        $this->adminData = $adminData;

    }

    public function show()
    {
        $http = new Client;
        $userServiceUrl = env('USER_SERVICE_URL');
        $user = $http->get($userServiceUrl . '/v1/users/?role=Driver', ['headers' =>
            [
                'Authorization' => session('token'),
                'Accept' => 'application/json'
            ]
        ]);
        $responseData = json_decode((string)$user->getBody(), true);

        return $this->adminData->show($responseData['data']);

    }

    public function edit($id)
    {
        return  $this->adminData->edit($id);

    }

    public function view($id)
    {
        return $this->adminData->view($id);

    }

    public function editStatus(array $data)
    {
        return  $this->adminData->editStatus($data);
    }

    public function updateUser(array $data, $id)
    {
        return  $this->adminData->updateUser($data,$id);
    }

    public function updateUserInformation(array $data, $id)
    {
        return  $this->adminData->updateUserInformation($data,$id);

    }

    public function updateCarInformation(array $data, $id)
    {
        return  $this->adminData->updateCarInformation($data,$id);
    }

    public function search(array $data)
    {
        return  $this->adminData->search($data);
    }

    public function fetchCarByUserId($userId){
        return $this->adminData->fetchCarByUserId($userId);
    }

}
