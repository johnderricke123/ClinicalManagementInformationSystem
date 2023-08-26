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
        Schema::create('patient_files', function (Blueprint $table) {
            $table->id('id');
            $table->foreignIdFor(PatientPersonalInfo::class)->constrained()->cascadeOnDelete();
            $table->string('FileName');
            $table->string('Path');
            $table->string('Added_at');

            // $table->timestamps();
        });

        // Schema::table('patient_files', function (Blueprint $table) {
        //     $table->foreign('id')
        //         ->references('id')
        //         ->on('patient_personal_infos')
        //         ->onDelete('cascade');
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patient_files');
    }
};
