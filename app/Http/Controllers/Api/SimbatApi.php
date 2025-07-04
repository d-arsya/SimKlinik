<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class SimbatApi extends Controller
{
    public static function token()
    {
        return Cache::remember('simklinik_token', 60, function () {
            $response = Http::post(config('services.simbat_url') . 'login', [
                'email' => env('SIMKLINIK_EMAIL'),
                'password' => env('SIMKLINIK_PASS'),
            ]);

            if ($response->status() == 200 && !$response->redirect()) {
                return json_decode($response->body())->data->token;
            }

            abort(403);
        });
    }

    public static function getDrug($id)
    {
        $token = self::token();
        $response = Http::withToken($token)->get(config('services.simbat_url') . 'drugs/' . $id);
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
        return Cache::remember('simklinik_drug_all', 10, function () {
            $token = self::token();
            $response = Http::withToken($token)->get(config('services.simbat_url') . 'repacks');
            $total = json_decode($response->body())->data->total;
            $response = Http::withToken($token)->get(config('services.simbat_url') . 'repacks?per_page=' . $total);
            $drugs = json_decode($response->body())->data->data;
            return array_map(function ($item) {
                return [
                    'name'  => $item->name,
                    'price' => $item->price,
                    'stock' => $item->stock,
                ];
            }, $drugs);
        });
    }
    public function getDrugsByCategory($category)
    {
        $token = self::token();
        $response = Http::withToken($token)->get(config('services.simbat_url') . 'inventory/clinic-stocks?per_page=10000');
        $drugPrice = Http::withToken($token)->get(config('services.simbat_url') . 'inventory/drugs');
        $drugPrice = json_decode($drugPrice)->data;
        $drugs = json_decode($response->body())->data;
        $drugs = array_filter($drugs, function ($drug) use ($category) {
            return isset($drug->category) && strcasecmp($drug->category, $category) === 0;
        });
        $drugs = array_values($drugs);
        $drugs = array_map(function ($item) use ($drugPrice) {
            $dt = $this->getDrugPrice($drugPrice, $item->drug_code);
            return [
                'id'  => $dt[0],
                'quantity'  => $item->quantity,
                'name'  => $item->drug_name,
                'price' => $dt[1],
            ];
        }, $drugs);
        return $drugs;
    }

    private function getDrugPrice($prices, $drug)
    {
        foreach ($prices as $item) {
            if ($item->code == $drug) {
                return [$item->id, $item->last_price];
            }
        }
    }
    public static function getDrugCategories()
    {
        return Cache::remember('simklinik_drug_categories', 10, function () {
            $token = self::token();

            // Ambil total data
            $response = Http::withToken($token)->get(config('services.simbat_url') . 'categories');
            $total = json_decode($response->body())->data->total;

            // Ambil semua data
            $response = Http::withToken($token)->get(config('services.simbat_url') . 'categories?per_page=' . $total);
            $categories = json_decode($response->body())->data->data;

            // Format ulang data
            return array_map(function ($item) {
                return [
                    'name' => $item->name,
                    'id'   => $item->id,
                ];
            }, $categories);
        });
    }
    public static function getDrugTopSell()
    {
        return Cache::remember('simklinik_drug_top_sell', 10, function () {
            $token = self::token();
            $startDate = Carbon::now()->startOfMonth()->toDateString();
            $endDate = Carbon::now()->endOfMonth()->toDateString();

            // Make the request
            $response = Http::withToken($token)->get(config('services.simbat_url') . "transactions/top-selling", [
                'start_date' => $startDate,
                'end_date' => $endDate,
                'limit' => 10,
            ]);

            $total = json_decode($response->body())->data;
            $data = [];
            foreach ($total as $item) {
                // Remove last 2 words from name
                $nameWords = explode(' ', $item->name);
                $trimmedName = implode(' ', array_slice($nameWords, 0, -2));

                // Cast quantity to integer (e.g., 5.00 becomes 5)
                $quantity = (int) $item->total_quantity;

                $data[] = [
                    "name" => $trimmedName,
                    "quantity" => $quantity,
                ];
            }
            return $data;
        });
    }
}
