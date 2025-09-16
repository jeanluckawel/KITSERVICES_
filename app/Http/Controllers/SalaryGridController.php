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
        //
        $departments = department::all();
        $functions = fonction::all();
        $niveaux = niveau::all();
        $echelons = echelon::all();

        return view('salary_grids.create', compact('departments', 'functions', 'niveaux', 'echelons'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $request->validate([
            'department_id' => 'required|exists:departments,id',
            'function_id' => 'required|exists:functions,id',
            'niveau_id' => 'required|exists:niveaux,id',
            'echelon_id' => 'required|exists:echelons,id',
            'base_salary' => 'required|numeric|min:0',
        ]);

        salary_grid::create($request->all());

        return redirect()->route('salary_grids.index')->with('success', 'Niveau created successfully.');


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
}
