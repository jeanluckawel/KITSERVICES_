<?php

namespace App\Http\Controllers;

use App\Models\department;
use App\Models\echelon;
use App\Models\fonction;
use App\Models\niveau;
use App\Models\salary_grid;
use Illuminate\Http\Request;

class SalaryGridController extends Controller
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

    public function create()
    {
        $departments = department::all();
        $niveaux = niveau::all();
        $salaryGrids = salary_grid::with(['department','fonction','niveau','echelon'])->get();

        return view('salary_grids.create', compact('departments', 'niveaux', 'salaryGrids'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $request->validate([
            'department_id' => 'required|exists:departments,id',
            'fonction_id' => 'required|exists:fonctions,id',
            'niveau_id' => 'required|exists:niveaux,id',
            'echelon_id' => 'required|exists:echelons,id',
            'base_salary' => 'required|numeric|min:0',
        ]);


        salary_grid::create($request->all());

        return redirect()->back()->with('success', 'Niveau created successfully.');


    }

    /**
     * Display the specified resource.
     */
    public function show(salary_grid $salary_grid)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(salary_grid $salary_grid)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, salary_grid $salary_grid)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(salary_grid $salary_grid)
    {
        //
    }

    public function getFunctions($id)
    {
        $functions = \App\Models\Fonction::where('department_id', $id)->get();
        return response()->json($functions);
    }

    public function getEchelons($id)
    {
        $echelons = \App\Models\Echelon::where('niveau_id', $id)->get();
        return response()->json($echelons);
    }

}
