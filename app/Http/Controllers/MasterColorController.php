<?php

namespace App\Http\Controllers;

use App\Models\Color;
use Illuminate\Http\Request;

class MasterColorController extends Controller
{
    public function index(Request $request)
    {
        $colors = Color::paginate($request->unit ?? 10);
        return view('pages.color.index', compact('colors'));
    }

    public function create()
    {
        return view('pages.color.create');
    }

    public function store(Request $request)
    {
        try {
            Color::create($request->all());
            return to_route('color.index')->with('success', 'Berhasil menambahkan data warna');
        } catch (\Throwable $th) {
            return to_route('color.index')->with('error', 'Gagal menambahkan data warna');
        }
    }

    public function edit(Color $color)
    {
        return view('pages.color.edit', compact('color'));
    }

    public function update(Request $request, Color $color)
    {
        try {
            $color->update($request->all());
            return to_route('color.index')->with('success', 'Berhasil mengubah data warna');
        } catch (\Throwable $th) {
            return to_route('color.index')->with('error', 'Gagal mengubah data warna');
        }
    }

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
