<?php

namespace App\Http\Controllers;

use App\Models\salary_grid;

class SalaryController extends Controller
{
    public function getFunctions($departmentId)
    {
        $functions = salary_grid::where('department_id', $departmentId)
            ->with('fonction')
            ->get()
            ->pluck('fonction.name', 'function_id')
            ->unique();

        return response()->json($functions);
    }

    public function getLevelsEchelons($departmentId, $fonctionId)
    {
        $grids = salary_grid::where('department_id', $departmentId)
            ->where('function_id', $fonctionId)
            ->with(['niveau','echelon'])
            ->get();

        $niveaux = $grids->pluck('niveau.name', 'niveau_id')->unique();
        $echelons = $grids->pluck('echelon.name', 'echelon_id')->unique();

        return response()->json([
            'niveaux' => $niveaux,
            'echelons' => $echelons,
        ]);
    }

    public function getSalary($departmentId, $fonctionId, $niveauId, $echelonId)
    {
        $grid = salary_grid::where([
            ['department_id', $departmentId],
            ['function_id', $fonctionId],
            ['niveau_id', $niveauId],
            ['echelon_id', $echelonId],
        ])->first();

        return response()->json([
            'base_salary' => $grid ? $grid->base_salary : null
        ]);
    }
}
