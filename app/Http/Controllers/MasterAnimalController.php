<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\Diagnose;
use Illuminate\Http\Request;

class MasterAnimalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $animals = Animal::all();
        return view('pages.animal.index', compact('animals'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $diagnoses = Diagnose::all()->unique('name');
        return view('pages.animal.create', compact('diagnoses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $animal = Animal::create($request->all());
        if ($request->has('diagnose_name')) {
            $diagnoses = collect($request->diagnose_name)->map(function ($name) use ($animal) {
                return ['name' => $name];
            })->toArray();
            $animal->diagnoses()->createMany($diagnoses);
        }
        return to_route('animal.index')->with('success', 'Berhasil menambahkan hewan');
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
    public function edit(Animal $animal)
    {
        $diagnoses = Diagnose::all()->unique('name');
        $animalDiagnoses = $animal->diagnoses->pluck('name')->toArray();
        return view('pages.animal.edit', compact('animal', 'diagnoses', 'animalDiagnoses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Animal $animal)
    {

        $diagnoses = collect($request->diagnose_name)->map(function ($name) use ($animal) {
            return ['name' => $name];
        })->toArray();
        $animal->diagnoses()->delete();
        $animal->diagnoses()->createMany($diagnoses);
        $animal->update($request->all());
        return to_route('animal.index')->with('success', 'Berhasil mengubah data hewan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Animal $animal)
    {
        try {
            $animal->delete();
            return to_route('animal.index')->with('success', 'Berhasil menghapus hewan');
        } catch (\Throwable $th) {
            return to_route('animal.index')->with('error', 'Gagal menghapus hewan');
        }
    }
}
