<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;

class ChartController extends Controller
{   
    public function index(){
        return redirect()->action(
            'ChartController@filter', ['year' => 10]
        );
    }
    
    public function filter(Request $request) {
        $year = intval(request()->year);
        $totalStudent = count(Student::where('year_id', $year)->get());
        $maleChart = Student::where('gender', 1)
                            ->where('year_id',  $year)
                            ->get();
        $femaleChart = Student::where('gender', 2)
                            ->where('year_id',  $year)
                            ->get();;   

        $dataMaleMonth = [];
        $dataFemaleMonth = [];

        for ($i = 1; $i < 13; $i++) {
            $male = Student::where('gender', 1)
                            ->whereMonth('dob', '=', $i)
                            ->where('year_id', $year)
                            ->get();
            array_push($dataMaleMonth, count($male));

            $female = Student::where('gender', 2)
                            ->whereMonth('dob', '=', $i)
                            ->where('year_id', $year)
                            ->get();
            array_push($dataFemaleMonth, count($male));
        }

        $data1Quarter = count(Student::whereMonth('dob', '<', '4')
                                    ->where('year_id', $year)
                                    ->get());

        $data2Quarter = count(Student::whereMonth('dob', '>=', '4')
                                    ->whereMonth('dob', '<', '7')
                                    ->where('year_id', $year)
                                    ->get());


        $data3Quarter = count(Student::whereMonth('dob', '>=', '7')
                                    ->whereMonth('dob', '<', '10')
                                    ->where('year_id', $year)
                                    ->get());

        $data4Quarter = count(Student::whereMonth('dob', '>=', '10')
                                    ->where('year_id', $year)
                                    ->get()                         );
        $dataQuarter = [$data1Quarter, $data2Quarter, $data3Quarter, $data4Quarter];

        return view('app', compact('totalStudent', 'maleChart', 'femaleChart', 'dataMaleMonth', 'dataFemaleMonth', 'dataQuarter'));
    }
}
