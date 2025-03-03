<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    /** @use HasFactory<\Database\Factories\InvoiceFactory> */
    use HasFactory;
    protected $guarded = ["id", "created_at", "updated_at"];
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($item) {
            $today = Carbon::today()->format('ymd');
            $lastItem = Invoice::where('code', 'like', "INV-{$today}___")->orderBy('id', 'desc')->limit(1)->first();
            $lastId = $lastItem ? (int) substr($lastItem->code, -3) : 0;
            $code = "INV-$today" . str_pad($lastId + 1, 3, '0', STR_PAD_LEFT);
            $item->code = $code;
        });
    }
    public function checkup()
    {
        return $this->belongsTo(Checkup::class);
    }
    public function total()
    {
        $checkup = $this->checkup;

        $service = collect($checkup->servicesData())->sum(fn($service) => $service['price'] * $service['days']);
        $drug = collect($checkup->drugsData())->sum(fn($drug) => $drug->price * $drug->amount);

        return $service + $drug;
    }
}
