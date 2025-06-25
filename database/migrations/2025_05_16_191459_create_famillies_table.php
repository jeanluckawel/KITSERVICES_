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
        Schema::create('famillies', function (Blueprint $table) {
            $table->id();
            $table->string('employee_id');
            $table->string('father_name')->nullable();
            $table->string('father_name_status')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('mother_name_status')->nullable();
            $table->string('married')->nullable();
            $table->string('married_status')->nullable();
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
        Schema::dropIfExists('famillies');
    }
};
