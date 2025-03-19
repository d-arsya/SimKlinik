<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    /** @use HasFactory<\Database\Factories\AnimalFactory> */
    use HasFactory;
    protected $guarded = ["id", "created_at", "updated_at"];
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($item) {
            $lastId = Animal::max('id') + 1;
            $code = 'ANM-' . str_pad($lastId, 4, '0', STR_PAD_LEFT);
            $item->code = $code;
        });
    }
    public function types()
    {
        return $this->hasMany(Type::class);
    }
    public function diagnoses()
    {
        return $this->hasMany(Diagnose::class);
    }
    public function patients()
    {
        return $this->hasMany(Patient::class);
    }
}
