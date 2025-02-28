<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Village extends Model
{
    /** @use HasFactory<\Database\Factories\VillageFactory> */
    use HasFactory;
    protected $guarded = ["id", "created_at", "updated_at"];
    public function district()
    {
        return $this->belongsTo(District::class);
    }
}
