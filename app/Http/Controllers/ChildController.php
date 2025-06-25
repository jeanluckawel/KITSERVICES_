<?php

namespace App\Http\Controllers;

use App\Models\Child;
use App\Models\Employee;
use Illuminate\Http\Request;

class ChildController extends Controller
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
        $children = Child::where('employee_id', $employee_id)->get();

        return view('children.create', compact('employee', 'children'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $employee_id)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'gender' => 'required|in:M,F',
            'birthday' => 'nullable|date',
            'children_status' => 'required|string',
        ]);

        // Calcul automatique de l'âge
        $age = $request->birthday ? \Carbon\Carbon::parse($request->birthday)->age : null;

        Child::create([
            'employee_id' => $employee_id,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'middle_name' => $request->middle_name,
            'gender' => $request->gender,
            'birthday' => $request->birthday,
            'age' => $age,
            'children_status' => $request->children_status,
            'status' => 1,
        ]);

        return redirect()->route('employees.index')->with('success', 'Enfant ajouté avec succès.');


    }



    /**
     * Display the specified resource.
     */
    public function show(Child $child)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Child $child)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Child $child)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Child $child)
    {
        //
    }
}
