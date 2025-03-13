<?php

use App\Models\Animal;
use App\Models\Checkup;
use App\Models\Color;
use App\Models\Owner;
use App\Models\Patient;
use App\Models\Type;
use App\Models\User;
use App\Models\Vaccine;
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
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Owner::class)->constrained()->onDelete('restrict');
            $table->foreignIdFor(Animal::class)->constrained()->onDelete('restrict');
            $table->foreignIdFor(Type::class)->constrained()->onDelete('restrict');
            $table->foreignIdFor(Color::class)->constrained()->onDelete('restrict');
            $table->foreignIdFor(Vaccine::class)->constrained()->onDelete('restrict')->nullable();
            $table->string('name');
            $table->char('record', 8)->unique();
            $table->date('birth');
            $table->enum('gender', ['Jantan', 'Betina']);
            $table->timestamps();
        });
        Schema::create('checkups', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class, 'doctor_id')->constrained()->onDelete('restrict');
            $table->foreignIdFor(Patient::class)->constrained()->onDelete('restrict');
            $table->float('pulse');
            $table->float('temperature');
            $table->float('breath');
            $table->float('weight');
            $table->json('services')->nullable();
            $table->json('diagnoses')->nullable();
            $table->json('drugs')->nullable();
            $table->enum('status', ['diperiksa', 'menunggu', 'dibatalkan']);
            $table->boolean('queued')->default(true);
            $table->string('anamnesis')->nullable();
            $table->string('symptom')->nullable();
            $table->timestamps();
        });
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Checkup::class)->constrained()->onDelete('restrict');
            $table->char('code', 13)->unique();
            $table->integer('discount');
            $table->dateTime('paid')->nullable();
            $table->enum('method', ['cash', 'credit', 'transfer']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
        Schema::dropIfExists('checkups');
        Schema::dropIfExists('invoices');
    }
};
