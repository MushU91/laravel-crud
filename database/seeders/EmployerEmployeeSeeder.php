<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class EmployerEmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $employerId = DB::table('employers')->insertGetId([
            'name' => 'ABC Solutions Co.',
            'email' => 'info@abcsolution.com',
            'company_name' => 'ABC Solution Myanmar',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // create 20 random
        for($i = 1; $i <= 20; $i++) {
            DB::table('employees')->insert([
            'name' => fake()->name(),
            'position' => fake()->jobTitle(),
            'age' => rand(20,30),
            'email' => fake()->unique()->safeEmail(),
            'employer_id' => $employerId,
            'created_at' => now(),
            'updated_at' => now(),
            ]);
        }
    }
}
