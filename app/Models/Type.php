<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'animal_id'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($item) {
            $lastId = Type::max('id') + 1;
            $code = 'TYP-' . str_pad($lastId, 4, '0', STR_PAD_LEFT);
            $item->code = $code;
        });
    }

    public function animal()
    {
        return $this->belongsTo(Animal::class);
    }
}
