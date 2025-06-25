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
        Schema::create('emergencies', function (Blueprint $table) {
            $table->id();
            $table->string('employee_id');
            $table->string('title')->nullable();
            $table->string('full_name')->nullable();
            $table->string('relationship')->nullable();
            $table->string('mobile_phone')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('status')->default('1');
            $table->foreign('employee_id')->references('employee_id')->on('employees')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('emergencies');
    }
};
