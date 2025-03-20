<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\District;
use App\Models\Location;
use App\Models\Province;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function province()
    {
        $provinces = Location::distinct()->pluck('province');
        $response = [
            'success' => true,
            'code' => 200,
            'message' => 'Success retrieve all provinces data',
            'data' => $provinces
        ];
        return response()->json($response, 200);
    }
    public function city(string $province)
    {
        $cities = Location::where('province', $province)->distinct()->pluck('city');
        $response = [
            'success' => true,
            'code' => 200,
            'message' => 'Success retrieve all cities data',
            'data' => $cities
        ];
        return response()->json($response, 200);
    }
    public function district(string $city)
    {
        $districts = Location::where('city', $city)->distinct()->pluck('district');
        $response = [
            'success' => true,
            'code' => 200,
            'message' => 'Success retrieve all districts data',
            'data' => $districts
        ];
        return response()->json($response, 200);
    }
    public function village(string $district)
    {
        $villages = Location::where('district', $district)->distinct()->pluck('village');
        $response = [
            'success' => true,
            'code' => 200,
            'message' => 'Success retrieve all villages data',
            'data' => $villages
        ];
        return response()->json($response, 200);
    }
}
