<?php

namespace App\Http\Controllers;

use App\Models\Checkup;
use Illuminate\Http\Request;

class InpatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $inpatient = Checkup::whereFalse('queued')->get();
        return view('pages.inpatient.index', compact('inpatient'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.inpatient.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Checkup $inpatient)
    {
        return view('pages.inpatient.show', compact('inpatient'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Checkup $inpatient)
    {
        return view('pages.inpatient.edit', compact('inpatient'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Checkup $inpatient)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Checkup $inpatient)
    {
        //
    }
}
