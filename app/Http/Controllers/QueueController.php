<?php

namespace App\Http\Controllers;

use App\Models\Checkup;
use App\Models\Patient;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QueueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::user()->role == 'doctor') {
            $queues = Checkup::with(['patient'])->whereQueued(true)->where('status', 'menunggu')->get();
        } else {
            $queues = Checkup::with(['patient'])->whereQueued(true)->get();
        }
        return view('pages.queue.index', compact('queues'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.queue.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            "patient_id" => 'required|integer|exists:patients,id',
            "pulse" => 'required|numeric',
            "temperature" => 'required|numeric',
            "breath" => 'required|numeric',
            "weight" => 'required|numeric',
            "services" => 'required|integer|exists:services,id',
            "vaccine" => 'required|string|max:100',
        ]);
        $service = ["id" => $data["service"], "days" => 1];
        $data["status"] = "menunggu";
        $data["services"] = json_encode($service);
        Checkup::create($data);
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
    public function edit(string $id)
    {
        return view('pages.queue.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
