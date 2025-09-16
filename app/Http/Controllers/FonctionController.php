<?php

namespace App\Http\Controllers;

use App\Models\fonction;
use Illuminate\Http\Request;

class FonctionController extends Controller
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
        $departments = \App\Models\department::all();
        $functions = \App\Models\fonction::all();
        return view('fonction.create',compact('departments','functions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $request->validate([
            'name' => 'required|string|max:255',
            'department_id' => 'required|exists:departments,id',
        ]);
        fonction::create([
            'name' => $request->name,
            'department_id' => $request->department_id,
        ]);

        return redirect()->back()->with('success', 'Department created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(fonction $fonction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(fonction $fonction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, fonction $fonction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(fonction $fonction)
    {
        //
    }
}
