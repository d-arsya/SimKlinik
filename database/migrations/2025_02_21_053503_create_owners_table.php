<?php

use App\Models\City;
use App\Models\District;
use App\Models\Province;
use App\Models\Village;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('owners', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Province::class)->constrained()->onDelete('restrict');
            $table->foreignIdFor(City::class)->constrained()->onDelete('restrict');
            $table->foreignIdFor(District::class)->constrained()->onDelete('restrict');
            $table->foreignIdFor(Village::class)->constrained()->onDelete('restrict');
            $table->string('name');
            $table->enum('gender', ['Laki-Laki', 'Perempuan']);
            $table->string('address');
            $table->string('phone')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('owners');
    }
};
