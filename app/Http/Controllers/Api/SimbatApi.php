<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SimbatApi extends Controller
{
    protected static $endpoint = 'https://simbat.disyfa.site/api/v1/';
    public static function token()
    {
        $response = Http::post(self::$endpoint . 'login', ['email' => env('SIMKLINIK_EMAIL'), 'password' => env('SIMKLINIK_PASS')]);
        if ($response->status() == 200 && !$response->redirect()) {
            return json_decode($response->body())->data->token;
        }
        return abort(403);
    }

    public static function getDrug($id)
    {
        $token = self::token();
        $response = Http::withToken($token)->get(self::$endpoint . 'drugs/' . $id);
        $drugs = json_decode($response->body(), true)['data'];
        $drugs = [
            'id'    => $drugs['id'],
            'name'  => $drugs['name'],
            'price' => $drugs['last_price'],
            'type'  => $drugs['category']['name'],
        ];
        return $drugs;
    }
    public static function getDrugs()
    {
        $token = self::token();
        $response = Http::withToken($token)->get(self::$endpoint . 'repacks');
        $total = json_decode($response->body())->data->total;
        $response = Http::withToken($token)->get(self::$endpoint . 'repacks?per_page=' . $total);
        $drugs = json_decode($response->body())->data->data;
        $drugs = array_map(function ($item) {
            return [
                'name'  => $item->name,
                'price' => $item->price,
                'stock' => $item->stock,
            ];
        }, $drugs);
        return $drugs;
    }
    public function getDrugsByCategory($category)
    {
        $token = self::token();
        $response = Http::withToken($token)->get(self::$endpoint . 'categories/' . $category);
        $drugs = json_decode($response->body())->data->drugs;
        $drugs = array_map(function ($item) {
            return [
                'id'  => $item->id,
                'name'  => $item->name,
                'price' => $item->last_price,
            ];
        }, $drugs);
        return $drugs;
    }
    public static function getDrugCategories()
    {
        $token = self::token();
        $response = Http::withToken($token)->get(self::$endpoint . 'categories');
        $total = json_decode($response->body())->data->total;
        $response = Http::withToken($token)->get(self::$endpoint . 'categories?per_page=' . $total);
        $categories = json_decode($response->body())->data->data;
        $categories = array_map(function ($item) {
            return [
                'name'  => $item->name,
                'id'  => $item->id,
            ];
        }, $categories);
        return $categories;
    }
}
