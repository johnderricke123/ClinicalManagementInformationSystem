<?php

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
        Schema::create('patient_personal_infos', function (Blueprint $table) {
            $table->id();
            $table->string('FirstName')->nullable();
            $table->string('LastName')->nullable();
            $table->string('Age')->nullable();
            $table->string('Gender')->nullable();
            $table->string('Address')->nullable();
            $table->string('DateOfBirth')->nullable();
            $table->string('PlaceOfBirth')->nullable();
            $table->string('Occupation')->nullable();
            $table->string('Contact')->nullable();
            $table->dateTime('Added_at');
            // $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patient_personal_infos');
    }
};
