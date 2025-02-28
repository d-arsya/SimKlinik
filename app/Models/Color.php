<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    /** @use HasFactory<\Database\Factories\ColorFactory> */
    use HasFactory;
    protected $guarded = ["id", "created_at", "updated_at"];
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($item) {
            $lastId = Color::max('id') + 1;
            $code = 'CLR-' . str_pad($lastId, 4, '0', STR_PAD_LEFT);
            $item->code = $code;
        });
    }
    public function animal()
    {
        return $this->belongsTo(Animal::class);
    }
    public function patients()
    {
        return $this->hasMany(Patient::class);
    }
}
