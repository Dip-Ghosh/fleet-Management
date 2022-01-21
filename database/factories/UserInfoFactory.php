<?php

namespace Database\Factories;

use App\Models\UserInfo;
use Faker\Factory as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\User;
class UserInfoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = UserInfo::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = Faker::create();
        return [
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
            ];

    }
}
