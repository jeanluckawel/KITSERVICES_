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
            $table->unsignedBigInteger('customer_id'); // relation avec customers
            $table->string('po');
            $table->string('description');
            $table->string('unite')->nullable();
            $table->integer('quantity')->default(1);
            $table->decimal('pu', 10, 2); // prix unitaire
            $table->decimal('pt_mois', 10, 2); // prix total par mois

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
