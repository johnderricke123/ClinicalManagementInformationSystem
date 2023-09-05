<?php

use App\Models\PatientCheckUpDetails;
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
        Schema::create('patient_diagnoses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignIdFor(PatientCheckUpDetails::class)->constrained()->cascadeOnDelete();
            $table->string('PatientName');
            $table->longText('Diagnosis')->nullable();
            $table->date('DateGenerated');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patient_diagnoses');
    }
};
