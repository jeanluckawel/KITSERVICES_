<?php

namespace App\Http\Controllers;

use App\Models\department;
use App\Models\Employee;

class EmployeeCardController extends Controller
{
    public function index()
    {
        $employees = Employee::orderBy('created_at', 'desc')->get();

        $departments = Department::pluck('name')->all();
        return view('employees.card', compact('employees', 'departments'));
    }
}
