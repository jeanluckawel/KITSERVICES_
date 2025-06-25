<?php

namespace App\Http\Controllers;

use App\Imports\EmployeesImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class EmployeeImportController extends Controller
{
    //

    public function showForm()
    {
        return view('employees.import');
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv',
        ]);

        if (!empty($import->duplicates)) {
            return redirect()->back()->withErrors([
                'duplicates' => 'Les employés avec ces personal_id existent déjà : ' . implode(', ', $import->duplicates)
            ]);
        }

        Excel::import(new EmployeesImport, $request->file('file'));

        return redirect()->route('employees.index')->with('success', 'Importation réussie.');
    }
}
