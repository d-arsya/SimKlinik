<?php

namespace App\Http\Controllers;

use App\Models\Checkup;
use App\Models\Diagnose;
use App\Models\Patient;
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
    public function edit(Request $request, Patient $patient, string $diagnose, Checkup $checkup)
    {
        $checkup = Checkup::find($checkup);
        $diagnose =Diagnose::all();
        return view('pages.queue.edit', compact('diagnose', 'patient','checkup'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
