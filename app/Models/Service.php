<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    /** @use HasFactory<\Database\Factories\ServiceFactory> */
    use HasFactory;
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($item) {
            $lastId = Service::max('id') + 1;
            $code = 'SRV-' . str_pad($lastId, 4, '0', STR_PAD_LEFT);
            $item->code = $code;
        });
    }
    protected $guarded = ["id", "created_at", "updated_at"];
}
