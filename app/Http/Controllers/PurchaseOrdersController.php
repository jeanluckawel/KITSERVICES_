<?php

namespace App\Http\Controllers;

use App\Models\customers;
use App\Models\purchase_orders;
use Illuminate\Http\Request;

class PurchaseOrdersController extends Controller
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
        $customers = customers::all();
        return view('purchase_orders.show', compact('customers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'description' => 'required',
            'location' => 'nullable',
            'additional_notes' => 'nullable',
            'amount' => 'required|numeric',
        ]);

        $po = purchase_orders::create([
            'customer_id' => $request->customer_id,
            'po_number' => 'PO' . str_pad(purchase_orders::max('id') + 1, 5, '0', STR_PAD_LEFT) . 'OS',
            'date' => now(),
            'description' => $request->description,
            'location' => $request->location,
            'additional_notes' => $request->additional_notes,
            'invoice_number' => 'N' . now()->format('d/m/Y') . 'AA' . str_pad(purchase_orders::max('id') + 1, 3, '0', STR_PAD_LEFT),
            'amount' => $request->amount,
            'balance' => $request->amount,
            'status' => 'issued'
        ]);

        return redirect()->route('purchase-orders.show', $po->id);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $purchaseOrder = purchase_orders::with('customer')->findOrFail($id);
        return view('purchase_orders.show', compact('purchaseOrder'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(purchase_orders $purchase_orders)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, purchase_orders $purchase_orders)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(purchase_orders $purchase_orders)
    {
        //
    }
}
