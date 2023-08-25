<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('identity')->unique()->nullable(); // mã nhân viên
            $table->string('fullname')->nullable();
            $table->date('date_of_birth')->nullable(); 
            $table->string('common_name')->nullable(); // tên thường gọi
            $table->integer('gender')->default(1);
            $table->string('identity_card')->unique()->nullable(); // cccd
            $table->date('start_working_date')->nullable(); // ngayfd bắt đầu làm việc
            $table->date('official_start_working_date')->nullable(); // ngày chính thức làm việc
            $table->string('working_status')->nullable();
            $table->string('current_address')->nullable(); // địa chỉ hiện tại
            $table->string('permanent_address')->nullable(); //địa chỉ thường trú
            $table->string('domicile')->nullable(); // nguyên quán
            $table->string('place_of_birth')->nullable(); // nơi sinh
            $table->string('phone')->unique()->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('password')->default(Hash::make('nhanvien123'));
            $table->string('decision_number')->nullable(); // số quyết định
            $table->date('decision_date')->nullable(); // ngày quyết định
            $table->string('position')->nullable(); // vị trí làm việc
            $table->string('title')->nullable(); // chức danh
            $table->string('department')->nullable();
            $table->string('contract_number')->nullable(); // số hợp đồng
            $table->string('contract_type')->nullable(); // loại hợp đồng
            $table->date('contract_start')->nullable();
            $table->date('contract_end')->nullable();
            // $table->foreign('identity')->references('employee_id')->on('contracts')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
