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
        Schema::create('scheduled_check_ups', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->foreignIdFor(PatientCheckUpDetails::class)->constrained()->cascadeOnDelete();
            $table->string('PatientName');
            $table->string('Gender');
            $table->longText('RecentPrescription');
            $table->dateTime('DateAndTime');
            $table->integer('Age'); 
            $table->string('Address')->nullable(); 
            $table->date('NextCheckUp')->nullable(); 
            $table->timestamps();

        });


        // Schema::table('scheduled_check_ups', function (Blueprint $table) {
        //     $table->foreign('id')
        //         ->references('patient_check_up_details_id')
        //         ->on('patient_check_up_details')
        //         ->onDelete('cascade');
        // });

                             // Define foreign key outside the create() method
                            //  Schema::table('scheduled_check_ups', function (Blueprint $table) {
                            //     $table->foreign('id')
                            //         ->references('id')
                            //         ->on('patient_check_up_details')
                            //         ->onDelete('cascade');
                            // });
       
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scheduled_check_ups');
    }
};
