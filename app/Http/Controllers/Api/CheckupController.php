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
    public function serviceEdit(Checkup $checkup, string $service, string $days)
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
                $services[] = ['id' => $serviceId, 'days' => (int) $days];
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
    public function drugEdit(Checkup $checkup, string $drug, string $amount)
    {
        try {
            $drugs = json_decode($checkup->drugs, true) ?? [];
            $drugId = (int) $drug;
            $amount = (int) $amount;

            // Cari index berdasarkan id
            $index = collect($drugs)->search(function ($item) use ($drugId) {
                return isset($item['id']) && $item['id'] == $drugId;
            });

            if ($index !== false) {
                // Jika sudah ada, hapus
                unset($drugs[$index]);
                $drugs = array_values($drugs); // reset index array
            } else {
                $drug = SimbatApi::getDrug($drugId);
                $drugs[] = [
                    'id' => $drugId,
                    'amount' => $amount,
                    'name' => $drug["name"],
                    'type' => $drug["type"],
                    'price' => $drug["price"],
                    'notes' => ""
                ];
            }

            $checkup->drugs = json_encode($drugs);
            $checkup->save();

            return response()->json([
                'success' => true,
                'code' => 200,
                'message' => 'Drugs updated successfully.',
                'data' => $drugs
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
