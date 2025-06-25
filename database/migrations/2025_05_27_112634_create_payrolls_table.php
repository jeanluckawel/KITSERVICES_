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
        Schema::create('payrolls', function (Blueprint $table) {
            $table->id();
            $table->string('employee_id');
            $table->decimal('basic_usd_salary', 10, 2)->default(0)->nullable();
            $table->date('start_contract_date')->nullable();
            $table->integer('tax_dependants')->default(0)->nullable();
            $table->integer('worked_days')->default(0)->nullable();
            $table->decimal('baremic_salary', 10, 2)->default(0)->nullable();
            $table->decimal('accommodation_allowance', 10, 2)->default(0)->nullable();
            $table->decimal('sick_leave', 10, 2)->default(0)->nullable();
            $table->decimal('overtime_30', 10, 2)->default(0)->nullable();
            $table->decimal('overtime_60', 10, 2)->default(0)->nullable();
            $table->decimal('overtime_100', 10, 2)->default(0)->nullable();
//            $table->decimal('accommodation_allowance', 10, 2)->default(0)->nullable();
            $table->decimal('total_earnings', 10, 2)->default(0)->nullable();
            $table->decimal('inss_5', 10, 2)->default(0)->nullable();
            $table->decimal('monthly_ipr', 10, 2)->default(0)->nullable();
            $table->decimal('ipr_rate', 5, 2)->default(0)->nullable();
            $table->decimal('net', 10, 2)->default(0)->nullable();
            $table->decimal('net_usd', 10, 2)->default(0)->nullable();
            $table->decimal('cnss_13', 10, 2)->default(0)->nullable();
            $table->decimal('inpp_2', 10, 2)->default(0)->nullable();
            $table->decimal('onem_0_2', 10, 2)->default(0)->nullable();
            $table->decimal('total_taxes_cdf', 10, 2)->default(0)->nullable();
            $table->decimal('royalties_10_usd', 10, 2)->default(0)->nullable();
            $table->decimal('inss_tax_base', 10, 2)->default(0)->nullable();
            $table->decimal('ipr_tax_base', 10, 2)->default(0)->nullable();
            $table->decimal('annual_ipr_tax_base', 10, 2)->default(0)->nullable();
            $table->decimal('tranche_2', 10, 2)->nullable();
            $table->decimal('tranche_3', 10, 2)->nullable();
            $table->decimal('tranche_more_3', 10, 2)->nullable();
            $table->decimal('deduction', 10,  2)->nullable();
            $table->date('period')->nullable();
            $table->decimal('exchange_rate', 10, 2)->default(1)->nullable();
            $table->foreign('employee_id')->references('employee_id')->on('employees')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payrolls');
    }
};
