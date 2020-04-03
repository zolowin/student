<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
// use Faker\Factory as Faker;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        // for($j = 0; $j < 10; $j ++){
        //     for($i = 0; $i < 400; $i++) {
        //         $year = mt_rand(1995, 2005);
        //         $month= mt_rand(1, 12);
        //         $day= mt_rand(1, 28);
        //         $randomDate = $year . "-" . $month . "-" . $day;
        //         DB::table('students')->insert([
        //             'name' => Str::random(10),
        //             'gender' => rand(1,2),
        //             'dob' => $randomDate,
        //         ]);
        //     }
        // }
        // $faker = Faker::create();
        $limit =  4000;
        
        for ($i = 0; $i < $limit; $i++) {
            $month= mt_rand(1, 12);
            $day= mt_rand(1, 28);
            DB::table('students')->insert([
                'name' => Str::random(10),
                'gender' => rand(1,2),
                'dob' => mt_rand(1995,2005)."-".$month."-".$day,
                'year_id'=> mt_rand(1,10)
            ]);
        }
    }
}
