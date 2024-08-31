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
        Schema::create('table1', function (Blueprint $table) {
            $table->id()->notnull;
            $table->string('hall_id');
            $table->string('level');
            $table->string('subject_id');
            $table->string('date');
            $table->time('start_time');
            $table->time('end_time');
            $table->boolean('is_visible')->default(true);
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
        Schema::dropIfExists('table1');
    }
};
