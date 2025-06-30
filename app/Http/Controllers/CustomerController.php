<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
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
        return view('customers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required|string|max:255',
            'id_nat' => 'required|string|max:50|unique:customers,id_nat',
            'rccm' => 'nullable|string|max:50',
            'nif' => 'nullable|string|max:50',
            'province' => 'required|string|max:100',
            'ville' => 'required|string|max:100',
            'commune' => 'required|string|max:100',
            'quartier' => 'nullable|string|max:100',
            'avenue' => 'nullable|string|max:100',
            'numero' => 'nullable|string|max:50',
            'telephone' => 'required|string|max:20',
            'email' => 'nullable|email|max:255'
        ]);

        Customer::create($request->all());

        return redirect()->route('customer.create')->with('success', 'Customer has been created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customer $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        //
    }
}
