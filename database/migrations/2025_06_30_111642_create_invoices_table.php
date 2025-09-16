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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id');
            $table->string('po')->nullable();
            $table->string('numero_invoice')->nullable();
            $table->string('description');
            $table->string('unite')->nullable();
            $table->integer('quantity')->default(1);
            $table->integer('nb_jours')->default(1);
            $table->decimal('pu', 10, 2);
            $table->decimal('pt_jours', 10, 2);
            $table->decimal('pt_mois', 10, 2);

            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
