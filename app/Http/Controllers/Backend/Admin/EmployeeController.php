<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Exports\EmployeeExport;
use App\Http\Controllers\Controller;
use App\Imports\EmployeeImport;
use App\Models\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;


class EmployeeController extends Controller
{
    public function index() {
        $all_employee = User::all();
        return view('backend.admin.employee.index', compact('all_employee'));
    }

    public function import(Request $request)
    {
        $request->validate([
            'import_file' => 'required|mimes:xls,xlsx'
        ]);

        try {
            Excel::import(new EmployeeImport, $request->file('import_file'));
            return redirect()->back()->with('success', 'Import successful!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Import failed: ' . $e->getMessage());
        }
    }

    public function export() {
        return Excel::download(new EmployeeExport, 'employee.xlsx');
    }
}
