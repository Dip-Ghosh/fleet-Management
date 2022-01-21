<?php

namespace Database\Seeders;

use App\Models\CarBrand;
use App\Models\CarType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CarBrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = (new \Faker\Factory())::create();
        $faker->addProvider(new \Faker\Provider\Fakecar($faker));
        for($i=0;$i<100;$i++){
            CarBrand::create([
                'car_type_id' => CarType::all()->random()->id,
                'name' =>$faker->vehicleBrand
            ]);
        }

    }
}
