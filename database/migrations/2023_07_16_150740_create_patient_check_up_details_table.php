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
         Schema::create('patient_check_up_details', function (Blueprint $table) {
             // $table->id();
             $table->id();
             $table->string('PatientName')->nullable();
             $table->string('DoctorName')->nullable();
             $table->longText('Diagnosis')->nullable();
             $table->longText('LabFindings')->nullable();
             $table->dateTime('DateAndTimeOfCheckUp')->nullable();
             $table->dateTime('Added_at');
 
             // $table->timestamps();
 
 
         });
 
                     // Define foreign key outside the create() method
                     Schema::table('patient_check_up_details', function (Blueprint $table) {
                         $table->foreign('id')
                             ->references('id')
                             ->on('patient_personal_infos')
                             ->onDelete('cascade');
                     });
     }
 
 

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patient_check_up_details');
    }
};
