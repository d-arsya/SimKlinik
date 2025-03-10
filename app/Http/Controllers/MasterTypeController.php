<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\Type;
use Illuminate\Http\Request;

class MasterTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $types = Type::all();
        return view('pages.type.index', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $animals = Animal::all();
        return view('pages.type.create', compact('animals'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            Type::create($request->all());
            return to_route('type.index')->with('success', 'Berhasil menambahkan ras hewan');
        } catch (\Throwable $th) {
            return to_route('type.index')->with('error', 'Gagal menambahkan ras hewan');
        }
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
    public function edit(Type $type)
    {
        $animals = Animal::all();
        return view('pages.type.edit', compact('type', 'animals'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Type $type)
    {
        try {
            $type->update($request->all());
            return to_route('type.index')->with('success', 'Berhasil mengubah ras hewan');
        } catch (\Throwable $th) {
            return to_route('type.index')->with('error', 'Gagal mengubah ras hewan');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
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
