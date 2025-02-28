<?php

use App\Models\Animal;
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
        Schema::create('animals', function (Blueprint $table) {
            $table->id();
            $table->char('code', 8)->unique();
            $table->string('name');
            $table->float('pulse');
            $table->float('temperature');
            $table->float('breath');
            $table->timestamps();
        });
        Schema::create('colors', function (Blueprint $table) {
            $table->id();
            $table->char('code', 8)->unique();
            $table->string('name');
            $table->timestamps();
        });
        Schema::create('diagnoses', function (Blueprint $table) {
            $table->id();
            $table->char('code', 8)->unique();
            $table->foreignIdFor(Animal::class)->constrained()->onDelete('cascade');
            $table->string('name');
            $table->timestamps();
        });
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->char('code', 8)->unique();
            $table->string('name');
            $table->integer('price');
            $table->timestamps();
        });
        Schema::create('types', function (Blueprint $table) {
            $table->id();
            $table->char('code', 8)->unique();
            $table->foreignIdFor(Animal::class)->constrained()->onDelete('cascade');
            $table->string('name');
            $table->timestamps();
        });
        Schema::create('vaccines', function (Blueprint $table) {
            $table->id();
            $table->char('code', 8)->unique();
            $table->string('name');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('animals');
        Schema::dropIfExists('colors');
        Schema::dropIfExists('diagnoses');
        Schema::dropIfExists('services');
        Schema::dropIfExists('types');
    }
};
