<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\EndContract;
use Illuminate\Http\Request;

class EndContractController extends Controller
{
    public function create($employee_id)
    {
        $employee = Employee::where('employee_id', $employee_id)->firstOrFail();
        return view('end_contracts.create', compact('employee'));
    }

    public function store(Request $request, $employee_id)
    {
        $request->validate([
            'end_date' => 'required|date',
            'reason'   => 'required|string|max:255',
        ]);

        $employee = Employee::where('employee_id', $employee_id)->firstOrFail();

        $endContract = EndContract::create([
            'employee_id' => $employee_id,
            'end_date'    => $request->end_date,
            'reason'      => $request->reason,
        ]);


        return redirect()->route('end_contracts.show', $endContract->id,compact('employee'));
    }

//    public function show($id)
//    {
//        $endContract = EndContract::with('employee')->findOrFail($id);
//        return view('end_contracts.show', compact('endContract'));
//    }

}
