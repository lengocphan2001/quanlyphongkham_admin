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
        Schema::create('working_processes', function (Blueprint $table) {
            $table->id();
            $table->string('employee_id');
            $table->string('old_department');
            $table->string('new_department');
            $table->string('old_position');
            $table->string('new_position');
            $table->string('old_title');
            $table->string('new_title');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('working_processes');
    }
};
