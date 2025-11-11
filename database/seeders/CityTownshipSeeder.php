<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CityTownshipSeeder extends Seeder
{
    public function run(): void
    {
        // Step 1: Create 7 Cities
        $cities = [
            ['name' => 'Yangon'],
            ['name' => 'Mandalay'],
            ['name' => 'Bago'],
            ['name' => 'Naypyidaw'],
            ['name' => 'Taunggyi'],
            ['name' => 'Pathein'],
            ['name' => 'Mawlamyine'],
        ];

        // Insert cities and get their IDs
        foreach ($cities as $city) {
            $cityId = DB::table('cities')->insertGetId([
                'name' => $city['name'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // Step 2: Add Townships Manually for Each City
            $townships = match ($city['name']) {
                'Yangon' => ['Hlaing', 'Insein', 'Sanchaung', 'Tamwe'],
                'Mandalay' => ['Chanayethazan', 'Aungmyethazan', 'Amarapura', 'Pyigyidagun'],
                'Bago' => ['Thanatpin', 'Kawa', 'Waw', 'Daik-U'],
                'Naypyidaw' => ['Zabuthiri', 'Ottarathiri', 'Dekkhinathiri', 'Pobbathiri'],
                'Taunggyi' => ['Kalaw', 'Aungban', 'Hopong', 'Nyaungshwe'],
                'Pathein' => ['Kyaunggon', 'Ngapudaw', 'Kangyidaunt', 'Thabaung'],
                'Mawlamyine' => ['Thanbyuzayat', 'Mudon', 'Ye', 'Kyaikkhami'],
                default => [],
            };

            // Step 3: Insert Townships for this city
            foreach ($townships as $name) {
                DB::table('townships')->insert([
                    'city_id' => $cityId,
                    'township_name' => $name,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
