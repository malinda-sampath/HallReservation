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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('position');
            $table->string('hall');
            $table->string('purpose');
            $table->date('event_date');
            $table->time('start_time');
            $table->time('end_time');
            $table->string('contact_num');
            $table->string('status')->default('pending');
            $table->date('insert_date');
            $table->date('update_date');
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
