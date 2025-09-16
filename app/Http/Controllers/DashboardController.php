<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Employee;

class DashboardController extends Controller
{
    public function index()
    {
        $countEmployees = Employee::count()->where('status', '1');
        $countCustomers = Customer::count();

        return view('dashboard', compact('countEmployees', 'countCustomers'));
    }
}
