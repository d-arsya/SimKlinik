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
        if ($this->diagnoses) {
            return Diagnose::whereIn('id', json_decode($this->diagnoses))->get();
        } else {
            return [];
        }
    }
    public function servicesData()
    {
        $all = json_decode($this->services);
        $ids = array_map(fn($item) => $item->id, $all);
        $services = Service::whereIn('id', $ids)->get()->toArray();

        // Tambahkan nilai "days" dari JSON ke array hasil query
        foreach ($services as $index => &$service) {
            foreach ($all as $item) {
                if ($service['id'] == $item->id) {
                    $service['days'] = $item->days;
                    break;
                }
            }
        }

        return $services;
    }
    public function drugsData()
    {
        return json_decode($this->drugs) ?? [];
    }
    public function invoice()
    {
        return $this->hasOne(Invoice::class);
    }
    public function patient()
    {
        return $this->belongsTo(Patient::class)->with(['owner', 'animal']);
    }
}
