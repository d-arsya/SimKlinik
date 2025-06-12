<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\Checkup;
use App\Models\Diagnose;
use Illuminate\Http\Request;

class MasterDiagnoseController extends Controller
{
    public function index(Request $request)
    {
        $diagnoses = Diagnose::with('animal')->paginate($request->unit ?? 10);
        return view('pages.diagnose.index', compact('diagnoses'));
    }

    public function create(Request $request)
    {
        $animals = Animal::all();
        return view('pages.diagnose.create', compact('animals'));
    }

    public function store(Request $request)
    {
        try {
            if ($request->has('animal_id')) {
                foreach ($request->animal_id as $animalId) {
                    Diagnose::create([
                        'name' => $request->name,
                        'animal_id' => $animalId,
                    ]);
                }
            }

            return to_route('diagnose.index')->with('success', 'Berhasil menambhkan data diagnosa');
        } catch (\Throwable $th) {
            return to_route('diagnose.index')->with('error', 'Gagal menambhkan data diagnosa');
        }
    }

    public function edit(Diagnose $diagnose)
    {
        $animals = Animal::all();
        $selectedAnimal = $diagnose->animal_id;
        return view('pages.diagnose.edit', compact('diagnose', 'animals', 'selectedAnimal'));
    }

    public function update(Request $request, Diagnose $diagnose)
    {
        try {
            $diagnose->update($request->all());
            return to_route('diagnose.index')->with('success', 'Berhasil mengubah diagnosa');
        } catch (\Throwable $th) {
            return to_route('diagnose.index')->with('error', 'Gagal mengubah diagnosa');
        }
    }

    public function destroy(Diagnose $diagnose)
    {
        $che = Checkup::whereJsonContains('diagnoses', $diagnose->id)->count();
        if ($che > 0) {
            return to_route('diagnose.index')->with('error', 'Gagal menghapus diagnosa');
        }
        $diagnose->delete();
        return to_route('diagnose.index')->with('success', 'Berhasil menghapus diagnosa');
    }
}
