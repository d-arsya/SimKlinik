<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Api\SimbatApi;
use App\Models\Checkup;
use App\Models\Diagnose;
use App\Models\Patient;
use App\Models\Service;
use Illuminate\Http\Request;

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
    public function show(string $diagnose)
    {
        $diagnose = Checkup::find($diagnose);
        $patient = $diagnose->patient;
        return view('pages.patient.diagnose.show', compact('diagnose', 'patient'));
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
        $drugs = $checkup->drugsData();
        $categories = SimbatApi::getDrugCategories();
        return view('pages.queue.edit', compact('diagnose', 'patient', 'checkup', 'service', 'diagnoses', 'services', 'categories', 'drugs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Patient $patient, Checkup $diagnose)
    {
        $diagnose->update($request->only('symtomp', 'alternativeDrugs', 'anamnesis'));
        $diagnose->update(["queued" => !json_decode($request->inpatient), "status" => "diperiksa"]);
        if ($diagnose->queued) {
            return redirect()->route('invoice.edit', $diagnose->id);
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
