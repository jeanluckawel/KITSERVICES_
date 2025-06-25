<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Employee;
use App\Models\Familly;
use Illuminate\Http\Request;

class FamillyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function create($employee_id)
    {
        $employee = Employee::where('employee_id', $employee_id)->firstOrFail();
        return view('familly.create', compact('employee'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $employee_id)
    {
        $employee = Employee::where('employee_id', $employee_id)->firstOrFail();

        $validated = $request->validate([
            'father_name' => ['nullable'],
            'father_name_status' => ['nullable'],
            'mother_name' => ['nullable'],
            'mother_name_status' => ['nullable'],
            'married' => ['nullable'],
            'married_status' => ['nullable'],
        ]);



        Familly::create(array_merge($validated, [
            'employee_id' => $employee->employee_id,
            'status' => 1
        ]));



        return redirect()->route('employees.index')->with('success', 'Family saved successfully.');

    }


    /**
     * Show the form for creating a new resource.
     */


    /**
     * Store a newly created resource in storage.
     */


    /**
     * Display the specified resource.
     */
    public function show(Familly $familly)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Familly $familly)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Familly $familly)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Familly $familly)
    {
        //
    }
}
