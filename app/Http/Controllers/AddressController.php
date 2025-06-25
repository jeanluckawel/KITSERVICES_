<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Employee;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('test');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($employee_id)
    {
        $employee = Employee::where('employee_id', $employee_id)->firstOrFail();
        return view('address.create', compact('employee'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $employee_id)
    {
        $employee = Employee::where('employee_id', $employee_id)->firstOrFail();

        $validated = $request->validate([
            'house_phone' => 'nullable|string|max:255',
            'mobile_phone' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'address1' => 'required|string|max:255',
            'address2' => 'nullable|string|max:255',
            'city' => 'required|string|max:255',
        ]);



        Address::create(array_merge($validated, [
            'employee_id' => $employee->employee_id,
            'status' => 1
        ]));


        return redirect()->route('employees.index')->with('success', 'Address saved successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show(Address $address)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Address $address)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Address $address)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Address $address)
    {
        //
    }

    public function test(Request $request)
    {
        $name = $request->input('name');
        return view('test',compact('name'));

    }
}
