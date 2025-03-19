<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Animal;
use App\Models\Color;
use Illuminate\Http\Request;

class AnimalController extends Controller
{
    public function animal()
    {
        $animals = Animal::all();
        $response = [
            'success' => true,
            'code' => 200,
            'message' => 'Success retrieve all animals data',
            'data' => $animals
        ];
        return response()->json($response, 200);
    }
    public function type(Animal $animal)
    {
        $types = $animal->types;
        $response = [
            'success' => true,
            'code' => 200,
            'message' => 'Success retrieve all types data',
            'data' => $types
        ];
        return response()->json($response, 200);
    }
    public function color()
    {
        $colors = Color::all();
        $response = [
            'success' => true,
            'code' => 200,
            'message' => 'Success retrieve all colors data',
            'data' => $colors
        ];
        return response()->json($response, 200);
    }
}
