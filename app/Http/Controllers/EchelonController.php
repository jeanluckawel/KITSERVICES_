<?php

namespace App\Http\Controllers;

use App\Models\echelon;
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

        $echelons = echelon::all();
        return view('echelons.create', compact('echelons'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        echelon::create([
            'name' => $request->name,
        ]);

        return redirect()->route('echelons.create')->with('success', 'Échelon added successfully!');

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
