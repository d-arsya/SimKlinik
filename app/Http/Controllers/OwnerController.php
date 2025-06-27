<?php

namespace App\Http\Controllers;

use App\Models\Checkup;
use App\Models\Owner;
use Illuminate\Http\Request;

class OwnerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function show(Owner $owner)
    {
        $patients = $owner->patients->pluck('id')->toArray();
        $checkups = Checkup::whereIn('patient_id', $patients)->with('patient')->paginate(10);
        return view('pages.owner.show', compact('owner', 'checkups'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Owner $owner)
    {
        return view('pages.owner.edit', compact('owner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Owner $owner)
    {
        $owner->update($request->all());
        return redirect()->route('owner.show', $owner->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
