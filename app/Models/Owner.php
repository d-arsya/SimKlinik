<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    /** @use HasFactory<\Database\Factories\OwnerFactory> */
    use HasFactory;
    protected $guarded = ['id', 'created_at', 'updated_at'];
    public function patients()
    {
        return $this->hasMany(Patient::class);
    }
    public function checkups()
    {
        return $this->hasManyThrough(Checkup::class, Patient::class)->with(['patient.animal', 'patient.type']);
    }
}
