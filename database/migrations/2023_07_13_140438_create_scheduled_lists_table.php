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
        Schema::create('scheduled_lists', function (Blueprint $table) {
            $table->id();
            $table->string('ClientName');
            $table->string('AppointmentReason')->nullable();
            $table->dateTime('StartDateAndTime');
            $table->dateTime('EndDateAndTime')->nullable();
            $table->string('Status')->nullable();
            $table->dateTime('Added_at');
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scheduled_lists');
    }
};
