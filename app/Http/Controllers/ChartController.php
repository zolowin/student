<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;

class ChartController extends Controller
{
    public function index() {
        $maleChart = Student::where('gender', 1)->get();
        $femaleChart = Student::where('gender', 2)->get();

        $dataMaleMonth = [];
        $dataFemaleMonth = [];
        for($i = 1; $i <13; $i ++) {
            $male = Student::where('gender', 1)
            ->whereMonth('dob', $i)->get();
            array_push($dataMaleMonth, count($male));

            $female = Student::where('gender', 2)
            ->whereMonth('dob', $i)->get();
            array_push($dataFemaleMonth, count($male));
        }

        return view('app', compact('maleChart', 'femaleChart', 'dataMaleMonth', 'dataFemaleMonth'));
    }

}
