<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Patient;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $invoices = Invoice::with([
            'checkup.patient.animal',
            'checkup.patient.owner'
        ])->paginate($request->unit ?? 10);
        $patient = Patient::count();
        return view('pages.invoice.index', compact('invoices', 'patient'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.invoice.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Invoice $invoice)
    {
        $checkup = $invoice->checkup()->with(['patient.owner', 'patient.animal'])->first();
        return view('pages.invoice.show', compact('invoice', 'checkup'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Invoice $invoice)
    {
        $checkup = $invoice->checkup()->with(['patient.owner', 'patient.animal'])->first();
        return view('pages.invoice.edit', compact('invoice', 'checkup'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Invoice $invoice)
    {
        $invoice->update([
            "method" => $request->method,
            "notes" => $request->notes,
            "discount" => $request->discount,
            "free" => $request->free == "on",
            "paid" => now()
        ]);
        return redirect()->route('invoice.show', $invoice->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Invoice $invoice)
    {
        //
    }
}
