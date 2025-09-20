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
        Schema::create('children', function (Blueprint $table) {
            $table->id();
            $table->string('employee_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('middle_name')->nullable();;
            $table->string('children_status');
            $table->string('gender');
            $table->integer('age')->nullable();
            $table->date('birthday');
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
        Schema::dropIfExists('children');
    }
};
