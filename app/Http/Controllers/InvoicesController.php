<?php

namespace App\Http\Controllers;

use App\Mail\InvoiceCreatedMail;
use App\Models\clients;
use App\Models\invoices;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
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
            $invoice = invoices::create([
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
        $invoice = invoices::with('client')->latest()->get();
        return view('invoices.show', compact('invoice'));
    }


    /**
     * Display the specified resource.
     */

   public function show($id)
   {
       $invoice = invoices::with('client')->findOrFail($id);
       return view('invoices.show', compact('invoice'));
   }

    public function listByClient(clients $client)
    {
        $invoices = Invoices::where('client_id', $client->id)->get();

        return view('invoices.list', compact('client', 'invoices'));
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
