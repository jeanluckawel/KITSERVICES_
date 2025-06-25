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
        Schema::create('employee_entreprises', function (Blueprint $table) {
            $table->id();
            $table->string('employee_id');
            $table->string('function');
            $table->string('job_title');
            $table->string('department');
            $table->string('niveau');
            $table->string('echelon');
            $table->string('salaire_mesuel_brut');
            $table->string('salaire_horaire');
            $table->string('taux_horaire_brut_fc');;
            $table->string('type_contract');
            $table->string('situation_avant_debauche');

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
        Schema::dropIfExists('employee_entreprises');
    }
};
