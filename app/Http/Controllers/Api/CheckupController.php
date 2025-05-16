<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Checkup;
use App\Models\Diagnose;
use App\Models\Patient;
use Illuminate\Http\Request;

class CheckupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $checkups = Checkup::all();
        $response = [
            'success' => true,
            'code' => 200,
            'message' => 'Success retrieve all checkups data',
            'data' => $checkups
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
                'patient_id' => 'required|integer|exists:patients,id',
                'pulse' => 'required|numeric|min:0',
                'temperature' => 'required|numeric|min:0',
                'breath' => 'required|numeric|min:0',
                'weight' => 'required|numeric|min:0',
                'service_id' => 'integer|exists:services,id',
            ]);
            $data["services"] = json_encode([["id" => $data["service_id"], "days" => 1]]);
            $data["status"] = "menunggu";
            unset($data["service_id"]);
            if ($request->vaccine) {
                $vaccine = $request->validate([
                    'vaccine' => 'required|string',
                ]);
                Patient::find($request->patient_id)->update($vaccine);
            }
            $checkup = Checkup::create($data);
            $response = [
                'success' => true,
                'code' => 200,
                'message' => 'Success store checkup data',
                'data' => $checkup
            ];
            return response()->json($response, 200);
        } catch (\Throwable $th) {
            $response = [
                'success' => true,
                'code' => 200,
                'message' => 'Failed store checkup data',
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
        $checkup = Checkup::find($id);
        if ($checkup) {
            $response = [
                'success' => true,
                'code' => 200,
                'message' => 'Success retrieve checkup data',
                'data' => $checkup
            ];
            return response()->json($response, 200);
        } else {
            $response = [
                'success' => false,
                'code' => 404,
                'message' => 'Failed retrieve checkup data',
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
        // "diagnoses": "[9, 5, 5]",
        // "drugs": "[{\"id\": 9, \"date\": \"1970-12-15\", \"name\": \"laboriosam\", \"type\": \"et\", \"notes\": \"Illum qui quia quo architecto expedita et porro.\", \"price\": 35000, \"amount\": 10}, {\"id\": 2, \"date\": \"1993-04-18\", \"name\": \"rerum\", \"type\": \"eaque\", \"notes\": \"Dolorem labore doloremque ut distinctio sapiente perspiciatis.\", \"price\": 83000, \"amount\": 6}, {\"id\": 8, \"date\": \"1973-05-27\", \"name\": \"sunt\", \"type\": \"autem\", \"notes\": \"Inventore ut voluptatem et optio velit.\", \"price\": 34000, \"amount\": 2}]",
        // "status": "menunggu",
        // "queued": true,
        // "anamnesis": "Tempore cum est et voluptas autem quam et dolor possimus iure consectetur ad natus magni sequi sint fugit ex.",
        // "symptom": "Quia in ut molestiae ut inventore repellat porro consequatur sit et ex debitis.",
        $checkup = Checkup::find($id);
        if ($checkup) {
            try {
                $request->merge([
                    'diagnoses' => json_decode($request->diagnoses, true),
                    'drugs' => json_decode($request->drugs, true),
                ]);
                $data = $request->validate([
                    'doctor_id' => 'nullable|integer|exists:users,id',
                    'patient_id' => 'nullable|integer|exists:patients,id',
                    'pulse' => 'nullable|numeric|min:0',
                    'temperature' => 'nullable|numeric|min:0',
                    'breath' => 'nullable|numeric|min:0',
                    'weight' => 'nullable|numeric|min:0',
                    'services' => 'nullable|json',
                    'diagnoses' => 'nullable|array',
                    'diagnoses.*' => 'integer|exists:diagnoses,id',
                    'drugs' => 'nullable|array',
                    'drugs.*.id' => 'nullable|integer|exists:drugs,id',
                    'drugs.*.date' => 'nullable|date',
                    'drugs.*.name' => 'nullable|string|max:255',
                    'drugs.*.type' => 'nullable|string|max:100',
                    'drugs.*.notes' => 'nullable|string',
                    'drugs.*.price' => 'nullable|integer|min:0',
                    'drugs.*.amount' => 'nullable|integer|min:1',
                    'status' => 'nullable|string|in:menunggu,diperiksa,dibatalkan',
                    'queued' => 'nullable|boolean',
                    'anamnesis' => 'nullable|string',
                    'symptom' => 'nullable|string',
                ]);
                $old = $checkup->replicate();
                $checkup->update($data);
                $response = [
                    'success' => true,
                    'code' => 200,
                    'message' => 'Success update checkup data',
                    'data' => $checkup,
                    'old' => $old
                ];
                return response()->json($response, 200);
            } catch (\Throwable $th) {
                $response = [
                    'success' => true,
                    'code' => 400,
                    'message' => 'Success update checkup data',
                    'error' => $th->getMessage()
                ];
                return response()->json($response, 400);
            }
        } else {
            $response = [
                'success' => false,
                'code' => 404,
                'message' => 'Failed update checkup data',
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
        $checkup = Checkup::find($id);
        if ($checkup) {
            try {
                $checkup->delete();
                $response = [
                    'success' => true,
                    'code' => 200,
                    'message' => 'Success delete checkup data',
                    'data' => $checkup
                ];
                return response()->json($response, 200);
            } catch (\Throwable $th) {
                $response = [
                    'success' => true,
                    'code' => 200,
                    'message' => 'Failed delete checkup data',
                    'error' => $th->getMessage()
                ];
                return response()->json($response, 400);
            }
        } else {
            $response = [
                'success' => false,
                'code' => 404,
                'message' => 'Failed delete checkup data',
                'data' => null
            ];
            return response()->json($response, 404);
        }
    }

    public function diagnoseEdit(Checkup $checkup, string $diagnose)
    {
        try {
            $diagnoses = json_decode($checkup->diagnoses, true) ?? [];
            if (in_array($diagnose, $diagnoses)) {
                $diagnoses = array_values(array_diff($diagnoses, [$diagnose]));
            } else {
                $diagnoses[] = $diagnose;
            }
            $checkup->diagnoses = json_encode($diagnoses);
            $checkup->save();

            $response = [
                'success' => true,
                'code' => 200,
                'message' => 'Diagnose updated successfully.',
                'data' => $diagnoses
            ];
            return response()->json($response);
        } catch (\Throwable $th) {
            $response = [
                'success' => false,
                'code' => 200,
                'message' => $th->getMessage(),
                'data' => null
            ];
            return response()->json($response);
        }
    }
    public function serviceEdit(Checkup $checkup, string $service)
    {
        try {
            $services = json_decode($checkup->services, true) ?? [];
            $serviceId = (int) $service;
            $index = collect($services)->search(function ($item) use ($serviceId) {
                return isset($item['id']) && $item['id'] == $serviceId;
            });

            if ($index !== false) {
                unset($services[$index]);
                $services = array_values($services);
            } else {
                $services[] = ['id' => $serviceId, 'days' => 1];
            }

            $checkup->services = json_encode($services);
            $checkup->save();

            return response()->json([
                'success' => true,
                'code' => 200,
                'message' => 'Services updated successfully.',
                'data' => $services
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'code' => 500,
                'message' => $th->getMessage(),
                'data' => null
            ]);
        }
    }
}
