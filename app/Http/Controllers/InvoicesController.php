<?php

namespace App\Http\Controllers;

use App\Mail\InvoiceCreatedMail;
use App\Models\clients;
use App\Models\Customer;
use App\Models\Invoice;
use App\Models\invoices;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;


class InvoicesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function create($id)
    {
        $client = clients::findOrFail($id);
        return view('invoices.create', compact('client'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'client_id' => 'required|exists:clients,id',
            'po_order' => 'required|string',
            'items' => 'required|array|min:1',
            'items.*.date' => 'required|date',
            'items.*.amount' => 'required|numeric',
            'items.*.payment' => 'nullable|numeric',
            'items.*.balance' => 'nullable|numeric',
            'items.*.description' => 'nullable|string',
        ]);

        $savedInvoices = [];

        foreach ($request->items as $item) {
            $invoice = Invoices::create([
                'client_id' => $request->client_id,
                'po_order' => $request->po_order,
                'date' => $item['date'],
                'amount' => $item['amount'],
                'payment' => $item['payment'] ?? 0,
                'balance' => $item['balance'] ?? 0,
                'description' => $item['description'] ?? '',
            ]);
            $savedInvoices[] = $invoice;
        }

        $client = clients::find($request->client_id);
//okitobo7@gmail.com
//        Mail::to('kaweljeanluc@gmail.com')->send(new InvoiceCreatedMail($client, $savedInvoices));
          Mail::to(['kaweljeanluc@gmail.com','okitobo7@gmail.com'])->send(new InvoiceCreatedMail($client, $savedInvoices));
        return redirect()->route('clients.index')->with('success', 'Factures enregistrées avec succès.');
    }


    public function downloadPdf(invoices $invoice)
    {
//        $pdf = PDF\Pdf::loadView('invoices.show', compact('invoice'));
//        return $pdf->download('facture_' . $invoice->id . '.pdf');

        $pdf = PDF\Pdf::loadView('invoices.show', compact('invoice'));
        return $pdf->download('facture_' . $invoice->id . '.pdf');

    }



    public function index()
    {
        $invoice = Invoice::with('client')->latest()->get();
        return view('invoices.show', compact('invoice'));
    }


    /**
     * Display the specified resource.
     */

    public function show($id)
    {
        // Récupérer la facture sélectionnée
        $invoice = Invoice::findOrFail($id);

        // Récupérer le client lié
        $customer = $invoice->customer;

        // Récupérer toutes les lignes de la même facture (même PO et numéro_invoice)
        $invoices = Invoice::where('customer_id', $invoice->customer_id)
            ->where('po', $invoice->po)
            ->where('numero_invoice', $invoice->numero_invoice)
            ->get();

        return view('invoices.invoice', compact('customer', 'invoice', 'invoices'));
    }

    public function listByClient($clientId)
    {
        $customer = Customer::findOrFail($clientId);

        // On regroupe par po et numero_invoice
        $invoices = Invoice::select('po', 'numero_invoice', DB::raw('MIN(id) as id'))
            ->where('customer_id', $clientId)
            ->groupBy('po', 'numero_invoice')
            ->orderByDesc('id')
            ->get();

        return view('invoices.list', compact('customer', 'invoices'));
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(invoices $invoices)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, invoices $invoices)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(invoices $invoices)
    {
        //
    }
}
