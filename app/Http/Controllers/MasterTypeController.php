<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\Type;
use Illuminate\Http\Request;

class MasterTypeController extends Controller
{

    public function index()
    {
        $types = Type::all();
        return view('pages.type.index', compact('types'));
    }

    public function create()
    {
        $animals = Animal::all();
        return view('pages.type.create', compact('animals'));
    }

    public function store(Request $request)
    {
        try {
            Type::create($request->all());
            return to_route('type.index')->with('success', 'Berhasil menambahkan ras hewan');
        } catch (\Throwable $th) {
            return to_route('type.index')->with('error', 'Gagal menambahkan ras hewan');
        }
    }

    public function edit(Type $type)
    {
        $animals = Animal::all();
        return view('pages.type.edit', compact('type', 'animals'));
    }

    public function update(Request $request, Type $type)
    {
        try {
            $type->update($request->all());
            return to_route('type.index')->with('success', 'Berhasil mengubah ras hewan');
        } catch (\Throwable $th) {
            return to_route('type.index')->with('error', 'Gagal mengubah ras hewan');
        }
    }

    public function destroy(Type $type)
    {
        try {
            $type->delete();
            return to_route('type.index')->with('success', 'Berhasil menghapus ras hewan');
        } catch (\Throwable $th) {
            return to_route('type.index')->with('error', 'Gagal menghapus ras hewan');
        }
    }
}
