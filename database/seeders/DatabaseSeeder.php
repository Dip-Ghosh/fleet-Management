<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            UserInfoSeeder::class,
            CarSeeder::class,
//            PaymentDetailSeeder::class,
//            CarTypeSeeder::class,
//            CarBrandSeeder::class,
//            CarModelSeeder::class,
//            LocationSeeder::class,
        ]);

    }
}
