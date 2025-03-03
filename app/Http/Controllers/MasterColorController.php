<?php

namespace App\Http\Controllers;

use App\Models\Color;
use Illuminate\Http\Request;

class MasterColorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $colors = Color::all();
        return view('pages.color.index', compact('colors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.color.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            Color::create($request->all());
            return to_route('color.index')->with('success', 'Berhasil menambahkan data warna');
        } catch (\Throwable $th) {
            return to_route('color.index')->with('error', 'Gagal menambahkan data warna');
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
    public function edit(Color $color)
    {
        return view('pages.color.edit', compact('color'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Color $color)
    {
        try {
            $color->update($request->all());
            return to_route('color.index')->with('success', 'Berhasil mengubah data warna');
        } catch (\Throwable $th) {
            return to_route('color.index')->with('error', 'Gagal mengubah data warna');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Color $color)
    {
        try {
            $color->delete();
            return to_route('color.index')->with('success', 'Berhasil menghapus warna');
        } catch (\Throwable $th) {
            return to_route('color.index')->with('error', 'Gagal menghapus warna');
        }
    }
}
