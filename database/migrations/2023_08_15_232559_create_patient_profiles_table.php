<?php

use App\Models\PatientPersonalInfo;
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
        Schema::create('patient_profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(PatientPersonalInfo::class)->constrained()->cascadeOnDelete();
            $table->string('Alias');
            $table->string('FileName');
            $table->string('Path');
            $table->string('Added_at');

            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patient_profiles');
    }
};
