<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\PatientPersonalInfo;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('prescription_histories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignIdFor(PatientPersonalInfo::class)->constrained()->cascadeOnDelete();
            $table->string('PatientName');
            $table->string('Gender');
            $table->longText('Prescription');
            $table->dateTime('DateAndTime');
            $table->integer('Age'); 
            $table->string('Address')->nullable(); 
            $table->date('NextCheckUp')->nullable(); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prescription_histories');
    }
};
