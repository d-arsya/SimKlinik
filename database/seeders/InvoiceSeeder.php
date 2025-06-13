<?php

namespace Database\Seeders;

use App\Models\Checkup;
use App\Models\Invoice;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InvoiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= Checkup::count(); $i++) {
            Invoice::factory(1)->create(["checkup_id" => $i]);
        }
    }
}
