<?php

namespace App\Http\Controllers;

use App\Models\clients;
use Illuminate\Http\Request;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = clients::all();
        return view('clients.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

        return view('clients.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'company'     => 'required|string|max:255',
            'address'  => 'nullable|string|max:255',
            'country'  => 'nullable|string|max:255',
            'id_nat'    => 'nullable|string|max:50',
            'rccm'    => 'nullable|string|max:255',
            'nif'    => 'nullable|string|max:255',


        ]);

        clients::create($validated);

        return redirect()->route('clients.index')->with('success', 'Client ajouté avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(clients $clients)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(clients $clients)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, clients $clients)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(clients $clients)
    {
        //
    }
}
