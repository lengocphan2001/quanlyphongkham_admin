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
        Schema::create('salary_tables', function (Blueprint $table) {
            $table->id();
            $table->string('employee_id');
            $table->string('fullname');
            $table->string('department');
            $table->integer('month');
            $table->integer('year');
            $table->integer('total_labour');
            $table->integer('ot_labour');
            $table->integer('salary');
            $table->integer('salary_by_work');
            $table->integer('salary_ot');
            $table->integer('recieved_salary');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('salary_tables');
    }
};
