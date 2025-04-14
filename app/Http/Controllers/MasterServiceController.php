<?php

namespace App\Http\Controllers;

use App\Models\Checkup;
use App\Models\Service;
use Illuminate\Http\Request;

class MasterServiceController extends Controller
{

    public function index()
    {
        $services = Service::all();
        return view('pages.service.index', compact('services'));
    }

    public function create()
    {
        return view('pages.service.create');
    }

    public function store(Request $request)
    {
        try {
            Service::create($request->all());
            return to_route('service.index')->with('success', 'Berhasil menambahkan data layanan');
        } catch (\Throwable $th) {
            return to_route('service.index')->with('error', 'Gagal menambahkan data layanan');
        }
    }

    public function edit(Service $service)
    {
        return view('pages.service.edit', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        try {
            $service->update($request->all());
            return to_route('service.index')->with('success', 'Berhasil mengubah data layanan');
        } catch (\Throwable $th) {
            return to_route('service.index')->with('error', 'Gagal mengubah data layanan');
        }
    }

    public function destroy(Service $service)
    {
        $che = Checkup::whereJsonContains('services', ['id' => $service->id])->count();
        if ($che > 0) {
            return redirect()->back()->with('error', 'Gagal menghapus layanan');
        }
        $service->delete();
        return redirect()->back()->with('success', 'Berhasil menghapus layanan');
    }
}
