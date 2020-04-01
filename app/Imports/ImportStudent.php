<?php

namespace App\Imports;

use App\Student;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class ImportStudent implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $dob = date("Y-m-d", strtotime(str_replace('/', '-', $row['dob'])));

        return new Student([
            'name' => $row['name'],
            'gender' => $row['gender'],
            'dob' => $dob,
            'year' => $row['year']
        ]);
    }
}
