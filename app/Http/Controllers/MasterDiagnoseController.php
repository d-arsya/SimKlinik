<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\Diagnose;
use Illuminate\Http\Request;

class MasterDiagnoseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $diagnoses = Diagnose::with('animal')->get();
        return view('pages.diagnose.index', compact('diagnoses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $animals = Animal::all();
        return view('pages.diagnose.create', compact('animals'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Pastikan ada jenis hewan yang dipilih
        if ($request->has('animal_id')) {
            foreach ($request->animal_id as $animalId) {
                Diagnose::create([
                    'name' => $request->name,
                    'code' => $request->code,
                    'animal_id' => $animalId,
                ]);
            }
        }

        return redirect()->route('diagnose.index');
    }



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Diagnose $diagnose)
    {
        $animals = Animal::all();
        $selectedAnimal = $diagnose->animal_id;
        return view('pages.diagnose.edit', compact('diagnose', 'animals', 'selectedAnimal'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Diagnose $diagnose)
    {
        $diagnose->update($request->all());
        return redirect()->route('diagnose.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Diagnose $diagnose)
    {
        $diagnose->delete();
        return redirect()->route('diagnose.index');
    }
}
