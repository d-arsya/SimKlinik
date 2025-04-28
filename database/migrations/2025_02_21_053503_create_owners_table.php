<?php

use App\Models\City;
use App\Models\District;
use App\Models\Location;
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
        Schema::create('locations', function (Blueprint $table) {
            $table->id();
            $table->string('postalcode');
            $table->string('village');
            $table->string('district');
            $table->string('city');
            $table->string('province');
            $table->timestamps();
        });
        Schema::create('owners', function (Blueprint $table) {
            $table->id();
            // $table->foreignIdFor(Province::class)->constrained()->onDelete('restrict');
            // $table->foreignIdFor(City::class)->constrained()->onDelete('restrict');
            // $table->foreignIdFor(District::class)->constrained()->onDelete('restrict');
            // $table->foreignIdFor(Village::class)->constrained()->onDelete('restrict');
            $table->string( 'province');
            $table->string( 'city');
            $table->string( 'district');
            $table->string( 'village');
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
        Schema::dropIfExists('locations');
        Schema::dropIfExists('owners');
    }
};
