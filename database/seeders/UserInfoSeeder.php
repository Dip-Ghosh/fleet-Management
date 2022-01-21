<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\UserInfo;

class UserInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */


    public function run()
    {
        $faker = Faker::create();
        for ($i = 0; $i < 100; $i++) {
          UserInfo::create([
                'user_id' => User::all()->random()->id,
                'city' => Str::random(10),
                'partner_type' => 'Person',
                'company_name' => Str::random(10),
                'company_location' => Str::random(10),
                'garage_location' => Str::random(10),
                'type' => 'Company',
                'is_owner' => 'Yes',
                'is_driven_by' => 'Self-Driven',
                'is_ride_sharing_service_included' => 'Yes',
                'owner_national_id' => $faker->imageUrl('public/upload/',640, 480, null, false),
                'owner_profile_picture' => $faker->imageUrl('public/upload/',640, 480, null, false),
                'owner_tin_certificate' => $faker->imageUrl('public/upload/',640, 480, null, false),
                'number_of_car' => rand(1, 10),
                'drop_location' => Str::random(10),
            ]);
        }
    }

}
