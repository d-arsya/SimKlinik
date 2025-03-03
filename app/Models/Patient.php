<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    /** @use HasFactory<\Database\Factories\PatientFactory> */
    use HasFactory;
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($item) {
            $lastId = Patient::max('id') + 1;
            $code = 'RMH-' . str_pad($lastId, 4, '0', STR_PAD_LEFT);
            $item->record = $code;
        });
    }
    protected $guarded = ["id", "created_at", "updated_at"];
    public function owner()
    {
        return $this->belongsTo(Owner::class);
    }
    public function animal()
    {
        return $this->belongsTo(Animal::class);
    }
    public function type()
    {
        return $this->belongsTo(Type::class);
    }
    public function color()
    {
        return $this->belongsTo(Color::class);
    }
    public function vaccine()
    {
        return $this->belongsTo(Vaccine::class);
    }
    public function checkups()
    {
        return $this->hasMany(Checkup::class);
    }
    public function calcAge()
    {
        $birthDate = Carbon::parse($this->birth);
        $now = Carbon::now();

        $years = floor($birthDate->diffInYears($now));
        $months = floor($birthDate->copy()->addYears($years)->diffInMonths($now));

        return "{$years} tahun, {$months} bulan";
    }
}
