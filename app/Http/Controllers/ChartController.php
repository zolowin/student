<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;

class ChartController extends Controller
{
    public function index() {
        $maleChart = Student::where('gender', 1)->get();
        $femaleChart = Student::where('gender', 2)->get();
        return view('app', compact('maleChart', 'femaleChart'));
    }

    public function chartMonth(){
        $maleMonth = [];
        $femaleMonth = [];
        for($i = 1; $i <13; $i ++) {
            $male = Student::where('gender', 1)
            ->whereMonth('dob', $i)->get();
            $maleMonth[$i - 1] = count($male);

            $female = Student::where('gender', 2)
            ->whereMonth('dob', $i)->get();
            $femaleMonth[$i - 1] = count($female);
        }

        $labelsMonth = [];
        $dataMaleMonth = [];
        $dataFemaleMonth = [];
        
        foreach($maleMonth as $labels => $data){
            array_push($labelsMonth, $labels + 1);
            array_push($dataMaleMonth, $data );
        }
        
        foreach($femaleMonth as $labels => $data){
            array_push($dataFemaleMonth, $data );
        }

        // $data = array('labelsMonth' => $labelsMonth, 'dataMaleMonth' => $dataMaleMonth, 'dataFemaleMonth' => $dataFemaleMonth);

        return view('chart.month', compact('labelsMonth', 'dataMaleMonth', 'dataFemaleMonth')); 

    }

}
