<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Owner;
use Illuminate\Http\Request;

class OwnerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $owners = Owner::with(['location'])->get();
        $response = [
            'success' => true,
            'code' => 200,
            'message' => 'Success retrieve all owners data',
            'data' => $owners
        ];
        return response()->json($response, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $data = $request->validate([
        //     "province_id" => 'required|string|exists:locations,province',
        //     "city_id" => 'required|string|exists:locations,city',
        //     "district_id" => 'required|string|exists:locations,district',
        //     "village_id" => 'required|string|exists:locations,village',
        //     "name" => 'required|string|max:255',
        //     "gender" => 'required|string|in:Laki-Laki,Perempuan',
        //     "address" => 'required|string|max:300',
        //     "phone" => 'required|unique:owners,phone',
        // ]);
        try {
            $owner = Owner::create(attributes: $request->all());
            $response = [
                'success' => true,
                'code' => 200,
                'message' => 'Success store owner data',
                'data' => $owner
            ];
            return response()->json($response, 200);
        } catch (\Throwable $th) {
            $response = [
                'success' => false,
                'code' => 400,
                'message' => 'Failed store owner data',
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
        $owner = Owner::find($id);
        if ($owner) {
            $response = [
                'success' => true,
                'code' => 200,
                'message' => 'Success retrieve owner data',
                'data' => $owner
            ];
            return response()->json($response, 200);
        } else {
            $response = [
                'success' => false,
                'code' => 404,
                'message' => 'Failed retrieve owner data',
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
        $data = $request->validate([
            "province_id" => 'required|integer|exists:provinces,id',
            "city_id" => 'required|integer|exists:cities,id',
            "district_id" => 'required|integer|exists:districts,id',
            "village_id" => 'required|integer|exists:villages,id',
            "name" => 'required|string|max:255',
            "gender" => 'required|string|in:Laki-Laki,Perempuan',
            "address" => 'required|string|max:300',
            "phone" => 'required|unique:owners,phone',
        ]);
        $owner = Owner::find($id);
        if ($owner) {
            try {
                $old = $owner->replicate();
                $owner->update($data);
                $response = [
                    'success' => true,
                    'code' => 200,
                    'message' => 'Success update owner data',
                    'data' => $owner,
                    'old' => $old
                ];
                return response()->json($response, 200);
            } catch (\Throwable $th) {
                $response = [
                    'success' => true,
                    'code' => 400,
                    'message' => 'Success update owner data',
                    'error' => $th->getMessage()
                ];
                return response()->json($response, 400);
            }
        } else {
            $response = [
                'success' => false,
                'code' => 404,
                'message' => 'Failed update owner data',
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
        $owner = Owner::find($id);
        if ($owner) {
            try {
                $owner->delete();
                $response = [
                    'success' => true,
                    'code' => 200,
                    'message' => 'Success delete owner data',
                    'data' => $owner
                ];
                return response()->json($response, 200);
            } catch (\Throwable $th) {
                $response = [
                    'success' => true,
                    'code' => 200,
                    'message' => 'Failed delete owner data',
                    'error' => $th->getMessage()
                ];
                return response()->json($response, 400);
            }
        } else {
            $response = [
                'success' => false,
                'code' => 404,
                'message' => 'Failed delete owner data',
                'data' => null
            ];
            return response()->json($response, 404);
        }
    }
}
