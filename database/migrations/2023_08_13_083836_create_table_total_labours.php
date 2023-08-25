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
        Schema::create('total_labours', function (Blueprint $table) {
            $table->id();
            $table->string('employee_id');
            $table->integer('month');
            $table->integer('year');
            $table->integer('real_labour');
            $table->integer('leave_labour');
            $table->integer('ot_labour');
            $table->integer('total_labour');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('total_labours');
    }
};
