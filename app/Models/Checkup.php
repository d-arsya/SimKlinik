<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checkup extends Model
{
    /** @use HasFactory<\Database\Factories\QueueFactory> */
    use HasFactory;
    protected $guarded = ["id", "created_at", "updated_at"];
    protected function casts()
    {
        return [
            "queued" => "boolean"
        ];
    }
    public function diagnosesData()
    {
        return Diagnose::whereIn('id', json_decode($this->diagnoses))->get();
    }
    public function servicesData()
    {
        $ids = array_map(fn($item) => $item->id, json_decode($this->services));
        return Service::whereIn('id', $ids)->get();
    }
    public function drugsData()
    {
        return json_decode($this->drugs);
    }
    public function invoice()
    {
        return $this->hasOne(Invoice::class);
    }
    public function doctor()
    {
        return $this->belongsTo(User::class);
    }
    public function patient()
    {
        return $this->belongsTo(Patient::class)->with(['owner', 'animal']);
    }
}
