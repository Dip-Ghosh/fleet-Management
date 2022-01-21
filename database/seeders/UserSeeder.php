<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0;$i<100;$i++){

          User ::create([
                'name' => Str::random(10),
                'email' => Str::random(10).'@gmail.com',
                'mobile' =>mt_rand(1000000000, 9999999999),
                'password' => bcrypt('123456'),
            ]);
        }

    }
}
