<?php

namespace App\Http\Controllers;

use App\Models\department;
use App\Models\fonction;
use App\Models\niveau;
use Illuminate\Http\Request;

class NiveauController extends Controller
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

        $niveaux = niveau::all();
        return view('niveau.create', compact('niveaux'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $request->validate([
            'name' => 'required|string|max:255|unique:niveaux,name',
        ]);

        niveau::create([
            'name' => $request->name,
        ]);

        return redirect()->back()->with('success', 'Niveau created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(niveau $niveau)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(niveau $niveau)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, niveau $niveau)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(niveau $niveau)
    {
        //
    }
}
