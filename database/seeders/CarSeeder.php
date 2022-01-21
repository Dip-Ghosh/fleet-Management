<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Car;
use App\Models\CarType;
use App\Models\CarBrand;
use App\Models\CarModel;
class CarSeeder extends Seeder
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
          Car::create([
                'user_id' => User::all()->random()->id,
                'car_type' => CarType::all()->random()->id,
                'car_brand' => CarBrand ::all()->random()->id,
                'car_model' =>CarModel :: all()->random()->id,
                'car_color' => Str::random(10),
                'license_plate_number' => Str::random(10),
                'registration_number' => $faker->imageUrl('public/upload/', 640, 480, null, false),
                'fitness_certificate' => $faker->imageUrl('public/upload/', 640, 480, null, false),
                'tax_token' => $faker->imageUrl('public/upload/', 640, 480, null, false),
                'insurance_paper' => $faker->imageUrl('public/upload/', 640, 480, null, false),
                'car_image' => $faker->imageUrl('public/upload/', 640, 480, null, false),
                'interest_in_rental_service' => 'Yes'

            ]);
        }
    }
}
