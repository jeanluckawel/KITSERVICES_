<?php

namespace App\Http\Controllers;

use App\Models\Emergency;
use App\Models\Employee;
use App\Models\Familly;
use Illuminate\Http\Request;

class EmergencyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($employee_id)
    {
        $employee = Employee::where('employee_id', $employee_id)->firstOrFail();
        $emergency = $employee->emergency;

        return view('emergency.create', compact('employee', 'emergency'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $employee_id)
    {
        $employee = Employee::where('employee_id', $employee_id)->firstOrFail();

        $validated = $request->validate([
            'title' => 'nullable|string',
            'full_name' => 'required|string',
            'relationship' => 'required|string',
            'mobile_phone' => 'required|string',
            'address' => 'required|string',
            'city' => 'required|string',
        ]);

        Emergency::updateOrCreate(
            ['employee_id' => $employee->employee_id],
            array_merge($validated, ['status' => '1'])
        );





        return redirect()->route('employees.index')->with('success', 'Emergency contact saved successfully.');


    }

    /**
     * Display the specified resource.
     */
    public function show(Emergency $emergency)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Emergency $emergency)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Emergency $emergency)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Emergency $emergency)
    {
        //
    }
}
