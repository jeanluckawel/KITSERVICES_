<?php

namespace App\Http\Controllers;

use App\Models\items;
use Illuminate\Http\Request;

class ItemsController extends Controller
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

        return view('items.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'po_order' => 'required|string',
            'items' => 'required|array|min:1',
            'items.*.date' => 'required|date',
            'items.*.amount' => 'required|numeric|min:0',
            'items.*.payment' => 'nullable|numeric|min:0',
            'items.*.balance' => 'nullable|numeric|min:0',
            'items.*.description' => 'nullable|string',
        ]);

        foreach ($request->items as $index => $item) {
            $payment = $item['payment'] ?? 0;
            $balance = $item['balance'] ?? ($item['amount'] - $payment);
            $invoiceNumber = now()->format('d/m/Y') . 'AA' . str_pad($index + 1, 3, '0', STR_PAD_LEFT);

            items::create([
                'po_order' => $request->po_order,
                'date' => $item['date'],
                'invoice_number' => $invoiceNumber,
                'amount' => $item['amount'],
                'payment' => $payment,
                'balance' => $balance,
                'description' => $item['description'] ?? null,
            ]);
        }

        return view('invoice')->with('success', 'Factures enregistrées avec succès.');
    }


    /**
     * Display the specified resource.
     */
    public function show(items $items)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(items $items)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, items $items)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(items $items)
    {
        //
    }
}
