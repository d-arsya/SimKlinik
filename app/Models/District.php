<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    /** @use HasFactory<\Database\Factories\DistrictFactory> */
    use HasFactory;
    protected $guarded = ["id", "created_at", "updated_at"];
    public function city()
    {
        return $this->belongsTo(City::class);
    }
    public function villages()
    {
        return $this->hasMany(Village::class);
    }
}
