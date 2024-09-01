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
            $table->string('hall_id')->null;
            $table->string('level')->null;
            $table->string('subject_id')->null;
            $table->string('date')->null;
            $table->time('start_time');
            $table->time('end_time')->null;
            $table->boolean('is_visible')->null;
            $table->text('message')->null;
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
