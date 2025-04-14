<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function index()
    {
        $patients = Patient::with(['animal', 'owner'])->get();
        return view('pages.patient.index', compact('patients'));
    }

    public function show(Patient $patient)
    {
        return view('pages.patient.show', compact('patient'));
    }

    public function edit(Patient $patient)
    {
        return view('pages.patient.edit', compact('patient'));
    }

    public function update(Request $request, Patient $patient)
    {
        //
    }
}
