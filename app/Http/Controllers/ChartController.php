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
}
