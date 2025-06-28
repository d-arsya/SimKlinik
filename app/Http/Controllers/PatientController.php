<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\Color;
use App\Models\Owner;
use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function index(Request $request)
    {
        $perPage = $request->unit ?? 10;
        $sortOrder = $request->query('sort', 'asc');
        $patients = Patient::with(['animal', 'owner'])
            ->orderBy('created_at', $sortOrder)
            ->paginate($perPage);

        $patient = Patient::count();
        return view('pages.patient.index', compact('patients', 'patient'));
    }


    public function show(Patient $patient)
    {
        return view('pages.patient.show', compact('patient'));
    }

    public function edit(Patient $patient)
    {
        $animal = Animal::all();
        $owner = Owner::all();
        $color = Color::all();
        return view('pages.patient.edit', compact('patient', 'animal', 'owner', 'color'));
    }

    public function update(Request $request, Patient $patient)
    {
        $patient->update($request->all());
        return redirect()->route('patient.show', $patient->id);
    }
}
