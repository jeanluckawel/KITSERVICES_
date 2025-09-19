<?php

namespace App\Http\Controllers;

use App\Models\echelon;
use App\Models\niveau;
use Illuminate\Http\Request;

class EchelonController extends Controller
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

        $echelons = echelon::with('niveau')->get();
        $niveaux = niveau::all();

        return view('echelons.create', compact('echelons', 'niveaux'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'niveau_id' => 'required|unique:echelons,niveau_id',
            'name' => 'required|string|max:255',
        ], [
            'niveau_id.unique' => 'Ce niveau a déjà un échelon assigné.',
        ]);

        echelon::create($request->all());

        return redirect()->back()->with('success', 'Échelon ajouté avec succès !');
    }

    /**
     * Display the specified resource.
     */
    public function show(echelon $echelon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(echelon $echelon)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, echelon $echelon)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(echelon $echelon)
    {
        //
    }
}
