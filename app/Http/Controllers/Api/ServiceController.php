<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::all();
        $response = [
            'success' => true,
            'code' => 200,
            'message' => 'Success retrieve all services data',
            'data' => $services
        ];
        return response()->json($response, 200);
    }
}
