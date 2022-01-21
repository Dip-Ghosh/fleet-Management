<?php

namespace Database\Seeders;

use App\Models\CarBrand;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {



       Location::create([
            ['name' =>'Ashkona'],
            ['name' =>'Wari'],
            ['name' =>'Vatara'],
            ['name' =>'Uttara'],
            ['name' =>'Tongi'],
            ['name' =>'Tejgaon'],
            ['name' =>'Sutrapur'],
            ['name' =>'Shahjadpur'],
            ['name' =>'Shahabagh'],
            ['name' =>'Saidabad'],
            ['name' =>'Rampura'],
            ['name' =>'Ramna'],
            ['name' =>'Puran Dhaka'],
            ['name' =>'Panthapath'],
            ['name' =>'Paltan'],
            ['name' =>'Badda'],
            ['name' =>'Banani'],
            ['name' =>'Banasree'],
            ['name' =>'Baridhara'],
            ['name' =>'Bashundhara'],
            ['name' =>'Dhanmondi'],
            ['name' =>'Dokkhinkhan'],
            ['name' =>'Elephant road'],
            ['name' =>'Farmgate'],
            ['name' =>'Gabtoli'],
            ['name' =>'Gulshan'],
            ['name' =>'Hazaribag'],
            ['name' =>'Jatrabari'],
            ['name' =>'Kallyanpur'],
            ['name' =>'Kamalapur'],
            ['name' =>'Lalmatia'],
            ['name' =>'Malibagh'],
            ['name' =>'Mirpur'],
            ['name' =>'Moghbazar'],
            ['name' =>'Mohakhali'],
            ['name' =>'Mohammadpur'],
            ['name' =>'Motijheel'],
            ['name' =>'Naya Paltan'],
            ['name' =>'Motijheel'],
            ['name' =>'Niketan'],
            ['name' =>'Notun Bazar']
                ]
        );

    }
}

























