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
        Schema::create('salary_processes', function (Blueprint $table) {
            $table->id();
            $table->string('employee_id');
            $table->string('decision_number');
            $table->date('decision_date');
            $table->date('date_use');
            $table->string('department');
            $table->string('position');
            $table->integer('salary');
            $table->integer('total');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('salary_processes');
    }
};
