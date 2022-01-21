<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\UserInfo;
class ApiTest extends TestCase
{

//    public function test_registration()
//    {
//        $userData = [
//            "name" => "John Doe",
//            "email" => "doe@example.com",
//            "mobile" => "012123",
//            "password" => "123321",
//            "city" => "demo12345",
//            "partner_type" => "Person"
//        ];
//
//        $this->json('POST', 'http://127.0.0.1:8000/api/register', $userData, ['Accept' => 'application/json'])
//            ->assertStatus(200)
//            ->assertJsonStructure([
//                'success',
//                'status' ,
//                'data' ,
//                'message'
//            ]);
//    }
//
//    public function test_login()
//    {
//
//        $loginData = ['mobile' => '012123', 'password' => '123321'];
//
//        $this->json('POST', 'http://127.0.0.1:8000/api/login', $loginData, ['Accept' => 'application/json'])
//            ->assertStatus(200)
//            ->assertJsonStructure([
//                'success',
//                'status' ,
//                'data' ,
//                'message'
//            ]);
//
//        $this->assertAuthenticated();
//    }

    public function test_update_information()
    {



        $user = User::factory()->create();
        $userInfo = UserInfo::factory()->create();
        $payload = [
            'user_id' =>$user->id,
            "garage_location" => "Demo User",
            "drop_location" => "Sample Company",
            "is_owner" => "2014",
            "is_driven_by" => "San Bruno, California",
            "is_ride_sharing_service_included" => "Video-sharing platform"
        ];
        $token = $user->createToken('MyApp')->accessToken;

        $header = [];
        $header['Accept'] = 'application/json';
        $header['Authorization'] = 'Bearer '.$token;

        $this->json('POST', 'http://127.0.0.1:8000/api/userInformation',$payload, $header)
            ->assertStatus(200)
            ->assertJsonStructure([
                'success',
                'status' ,
                'data' ,
                'message'
            ]);
    }

}
