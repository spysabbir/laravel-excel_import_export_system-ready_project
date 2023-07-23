<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Exports\EmployeeExport;
use App\Http\Controllers\Controller;
use App\Imports\EmployeeImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class EmployeeController extends Controller
{
    public function index() {
        return view('backend.admin.employee.index');
    }

    public function import(Request $request) {
        Excel::import(new EmployeeImport, $request->file('import_file'));

        return back();
    }

    public function export() {
        return Excel::download(new EmployeeExport, 'employee.xlsx');
    }
}
