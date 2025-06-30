<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function create($customerId)
    {
        $customer = Customer::findOrFail($customerId);
        return view('invoices.create', compact('customer')); // Formulaire de création
    }

    public function show($customerId)
    {
        $customer = Customer::findOrFail($customerId);
        return view('invoices.invoice', compact('customer')); // Affichage facture
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Customer $customer)
    {
        //

        $request->validate([
            'po' => 'string|required',
            'description.*' => 'required|string',
            'unite.*' => 'nullable|string',
            'quantity.*' => 'required|numeric|min:1',
            'pu.*' => 'required|numeric|min:0',
            'pt_mois.*' => 'required|numeric|min:0',
        ]);

        foreach ($request->description as $index => $desc) {
            Invoice::create([
                'po' => $request->po,
                'customer_id' => $customer->id,
                'description' => $desc,
                'unite' => $request->unite[$index],
                'quantity' => $request->quantity[$index],
                'pu' => $request->pu[$index],
                'pt_mois' => $request->pt_mois[$index],
            ]);
        }

        return redirect()->route('invoices.show', $customer->id)->with('success', 'Facture créée avec succès');


    }

    /**
     * Display the specified resource.
     */


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Invoice $invoice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Invoice $invoice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Invoice $invoice)
    {
        //
    }
}
