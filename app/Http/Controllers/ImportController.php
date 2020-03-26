<?php
    
namespace App\Http\Controllers;
   
use Illuminate\Http\Request;
// use App\Exports\ExportUsers;
use App\Imports\ImportStudent;
use Maatwebsite\Excel\Facades\Excel;
   
class ImportController extends Controller
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function importExport()
    {
       return view('import');
    }
    
    /**
    * @return \Illuminate\Support\Collection
    */
    // public function export() 
    // {
    //     return Excel::download(new ExportUsers, 'users.xlsx');
    // }
    
    /**
    * @return \Illuminate\Support\Collection
    */
    public function import() 
    {
        Excel::import(new ImportStudent, request()->file('file'));
            
        return back();
    }
}