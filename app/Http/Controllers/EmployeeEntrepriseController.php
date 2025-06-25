<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\EmployeeEntreprise;
use Illuminate\Http\Request;

class EmployeeEntrepriseController extends Controller
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
        return view('entreprises.create', compact('employee'));
    }

    public function store(Request $request, $employee_id)
    {
        $request->validate([
            'function' => 'required|string|max:255',
            'job_title' => 'required|string|max:255',
            'department' => 'required|string|max:255',
            'niveau' => 'required|string|max:255',
            'echelon' => 'required|string|max:255',
            'salaire_mesuel_brut' => 'required|string|max:255',
            'salaire_horaire' => 'required|string|max:255',
            'taux_horaire_brut_fc' => 'required|string|max:255',
            'type_contract' => 'required|string|max:255',
            'situation_avant_debauche' => 'required|string|max:255',
        ]);

        EmployeeEntreprise::updateOrCreate(
            ['employee_id' => $employee_id],
            $request->all() + ['status' => 1, 'employee_id' => $employee_id]
        );

        return redirect()->route('entreprises.create', $employee_id)
            ->with('success', 'Informations d’entreprise enregistrées avec succès.');
    }
    /**
     * Display the specified resource.
     */
    public function show(EmployeeEntreprise $employeeEntreprise)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EmployeeEntreprise $employeeEntreprise)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, EmployeeEntreprise $employeeEntreprise)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EmployeeEntreprise $employeeEntreprise)
    {
        //
    }
}
