<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vaccine extends Model
{
    /** @use HasFactory<\Database\Factories\VaccineFactory> */
    use HasFactory;
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($item) {
            $lastId = Vaccine::max('id') + 1;
            $code = 'VCN-' . str_pad($lastId, 4, '0', STR_PAD_LEFT);
            $item->code = $code;
        });
    }
    protected $guarded = ["id", "created_at", "updated_at"];
    public function patients()
    {
        return $this->hasMany(Patient::class);
    }
}
