<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Api\SimbatApi;
use App\Models\Checkup;
use App\Models\Diagnose;
use App\Models\Invoice;
use App\Models\Patient;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PatientDiagnoseController extends Controller
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
    public function show(string $patient, string $diagnose)
    {
        $diagnose = Checkup::find($diagnose);
        $patient = Patient::find($patient);
        $services = $diagnose->servicesData();
        $drugs = $diagnose->drugsData();
        $diagnoses = $diagnose->diagnosesData();
        return view('pages.patient.diagnose.show', compact('diagnose', 'patient', 'services', 'drugs', 'diagnoses'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Patient $patient, Checkup $diagnose)
    {
        $checkup = $diagnose;
        $diagnose = $patient->animal->diagnoses;
        $diagnoses = Diagnose::whereIn('id', json_decode($checkup->diagnoses) ?? [])->get();
        $service = Service::all();
        $services = $checkup->servicesData();
        $drugs = $checkup->drugsData() ?? [];
        $categories = SimbatApi::getDrugCategories();
        return view('pages.queue.edit', compact('diagnose', 'patient', 'checkup', 'service', 'diagnoses', 'services', 'categories', 'drugs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Patient $patient, Checkup $diagnose)
    {
        $diagnose->update($request->only('symtomp', 'alternativeDrugs', 'anamnesis'));
        $diagnose->update(["queued" => !json_decode($request->inpatient)]);
        if ($diagnose->queued) {
            $diagnose->status = "diperiksa";
            $diagnose->save();
            $invoice = Invoice::create([
                "checkup_id" => $diagnose->id
            ]);
            if (Auth::user()->role == 'doctor') {
                return redirect()->route('queue.index');
            } else {
                return redirect()->route('invoice.edit', $invoice->id);
            }
        } else {
            return redirect()->route('queue.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
