<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\District;
use App\Models\Province;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function province()
    {
        $provinces = Province::all();
        $response = [
            'success' => true,
            'code' => 200,
            'message' => 'Success retrieve all provinces data',
            'data' => $provinces
        ];
        return response()->json($response, 200);
    }
    public function city(Province $province)
    {
        $cities = $province->cities;
        $response = [
            'success' => true,
            'code' => 200,
            'message' => 'Success retrieve all cities data',
            'data' => $cities
        ];
        return response()->json($response, 200);
    }
    public function district(City $city)
    {
        $districts = $city->districts;
        $response = [
            'success' => true,
            'code' => 200,
            'message' => 'Success retrieve all districts data',
            'data' => $districts
        ];
        return response()->json($response, 200);
    }
    public function village(District $district)
    {
        $villages = $district->villages;
        $response = [
            'success' => true,
            'code' => 200,
            'message' => 'Success retrieve all villages data',
            'data' => $villages
        ];
        return response()->json($response, 200);
    }
}
