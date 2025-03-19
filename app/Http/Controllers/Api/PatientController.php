<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $patients = Patient::with(['owner', 'animal', 'type', 'color'])->get();
        $response = [
            'success' => true,
            'code' => 200,
            'message' => 'Success retrieve all patients data',
            'data' => $patients
        ];
        return response()->json($response, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $data = $request->validate([
                'owner_id' => 'required|integer|exists:owners,id',
                'animal_id' => 'required|integer|exists:animals,id',
                'type_id' => 'required|integer|exists:types,id',
                'color_id' => 'required|integer|exists:colors,id',
                'name' => 'required|string|max:255',
                'birth' => 'required|date',
                'gender' => 'required|string|in:Jantan,Betina',
            ]);
            $patient = Patient::create($data);
            $response = [
                'success' => true,
                'code' => 200,
                'message' => 'Success store patient data',
                'data' => $patient
            ];
            return response()->json($response, 200);
        } catch (\Throwable $th) {
            $response = [
                'success' => true,
                'code' => 200,
                'message' => 'Failed store patient data',
                'error' => $th->getMessage()
            ];
            return response()->json($response, 400);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $patient = Patient::find($id);
        if ($patient) {
            $response = [
                'success' => true,
                'code' => 200,
                'message' => 'Success retrieve patient data',
                'data' => $patient
            ];
            return response()->json($response, 200);
        } else {
            $response = [
                'success' => false,
                'code' => 404,
                'message' => 'Failed retrieve patient data',
                'data' => null
            ];
            return response()->json($response, 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $patient = Patient::find($id);
        if ($patient) {
            try {
                $data = $request->validate([
                    'owner_id' => 'required|integer|exists:owners,id',
                    'animal_id' => 'required|integer|exists:animals,id',
                    'type_id' => 'required|integer|exists:types,id',
                    'color_id' => 'required|integer|exists:colors,id',
                    'name' => 'required|string|max:255',
                    'birth' => 'required|date',
                    'gender' => 'required|string|in:Jantan,Betina',
                ]);
                $old = $patient->replicate();
                $patient->update($data);
                $response = [
                    'success' => true,
                    'code' => 200,
                    'message' => 'Success update patient data',
                    'data' => $patient,
                    'old' => $old
                ];
                return response()->json($response, 200);
            } catch (\Throwable $th) {
                $response = [
                    'success' => true,
                    'code' => 400,
                    'message' => 'Success update patient data',
                    'error' => $th->getMessage()
                ];
                return response()->json($response, 400);
            }
        } else {
            $response = [
                'success' => false,
                'code' => 404,
                'message' => 'Failed update patient data',
                'data' => null
            ];
            return response()->json($response, 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $patient = Patient::find($id);
        if ($patient) {
            try {
                $patient->delete();
                $response = [
                    'success' => true,
                    'code' => 200,
                    'message' => 'Success delete patient data',
                    'data' => $patient
                ];
                return response()->json($response, 200);
            } catch (\Throwable $th) {
                $response = [
                    'success' => true,
                    'code' => 200,
                    'message' => 'Failed delete patient data',
                    'error' => $th->getMessage()
                ];
                return response()->json($response, 400);
            }
        } else {
            $response = [
                'success' => false,
                'code' => 404,
                'message' => 'Failed delete patient data',
                'data' => null
            ];
            return response()->json($response, 404);
        }
    }
}
