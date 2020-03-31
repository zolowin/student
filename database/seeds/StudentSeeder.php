<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $month= mt_rand(1, 12);
 
        $day= mt_rand(1, 28); 
        for($j = 0; $j < 10; $j ++){
            for($i = 0; $i < 400; $i++) {
                $year = 199 . $j;
                $randomDate = $year . "-" . $month . "-" . $day;
                DB::table('students')->insert([
                    'name' => Str::random(10),
                    'gender' => rand(1,2),
                    'dob' => $randomDate,
                ]);
            }
        }
    }
}
