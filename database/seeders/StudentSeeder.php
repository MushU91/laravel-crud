<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Ramsey\Uuid\Type\Integer;
use App\Models\Student;


class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
//         //
        // DB::table('testings')->insert([
        //     [ 'name' => 'John',  'age' => '22', 'address' => 'yangon',],
        //     [ 'name' => 'Weik', 'age' => '21', 'address' => 'mandalay'],
        // ] );
        // DB::table('testings')->insert([
        //     'name' => Str::random(19),
        //     'age' => rand(10,200),
        //     'address' => Str::random(10)
        // ]);
    
        Student::factory(30)->create();

        

    }
}
