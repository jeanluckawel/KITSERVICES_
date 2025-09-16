<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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


        $lastInvoice = Invoice::where('customer_id', $customerId)
            ->latest()
            ->firstOrFail();


        $invoices = Invoice::where('customer_id', $customerId)
            ->where('po', $lastInvoice->po)
            ->where('numero_invoice', $lastInvoice->numero_invoice)
            ->get();

        return view('invoices.invoice', [
            'customer' => $customer,
            'invoice' => $lastInvoice,
            'invoices' => $invoices,
        ]);
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Customer $customer)
    {
        $request->validate([
            'po' => 'required|string',
            'description.*' => 'required|string',
            'unite.*' => 'nullable|string',
            'quantity.*' => 'required|numeric|min:1',
            'pu.*' => 'required|numeric|min:0',
            'pt_jours.*' => 'required|numeric|min:0',
            'nb_jours.*' => 'required|numeric|min:0',
            'pt_mois.*' => 'required|numeric|min:0',
        ]);

        // 🔢 Génération du numéro de facture (ex: 2507-001)
        $prefix = now()->format('ym'); // y=année sur 2 chiffres, m=mois
        $lastInvoice = Invoice::where('numero_invoice', 'like', $prefix.'%')
            ->orderBy('numero_invoice', 'desc')
            ->first();

        if ($lastInvoice && preg_match('/\d{4}-(\d{3})$/', $lastInvoice->numero_invoice, $matches)) {
            $nextNumber = str_pad((int)$matches[1] + 1, 3, '0', STR_PAD_LEFT);
        } else {
            $nextNumber = '001';
        }

        $numeroInvoice = $prefix . '-' . $nextNumber; // Résultat final : 2507-001

        // 📦 Enregistrement de chaque ligne de facture
        foreach ($request->description as $index => $desc) {
            Invoice::create([
                'po'             => $request->po,
                'customer_id'    => $customer->id,
                'numero_invoice' => $numeroInvoice,
                'description'    => $desc,
                'unite'          => $request->unite[$index],
                'quantity'       => $request->quantity[$index],
                'pu'             => $request->pu[$index],
                'pt_jours'       => $request->pt_jours[$index],
                'nb_jours'       => $request->nb_jours[$index],
                'pt_mois'        => $request->pt_mois[$index],
            ]);
        }

        return redirect()
            ->route('invoices.show', $customer->id)
            ->with('success', 'Facture créée avec succès. Numéro : ' . $numeroInvoice);
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

    public function detail($numero_invoice)
    {
        $lines = Invoice::where('po', $numero_invoice)
            ->select('po')
            ->groupBy('po')
            ->get();

        if ($lines->isEmpty()) {
            return back()->with('error', 'Facture introuvable.');
        }

        $customer = Customer::find($lines->first()->customer_id);

        return view('invoices.invoice', compact('lines', 'numero_invoice', 'customer'));
    }


}
