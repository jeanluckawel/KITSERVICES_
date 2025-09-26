<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('kitservice', function (Blueprint $table) {
            $table->id();

            $table->string('company_name')->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('website')->nullable();
            $table->string('id_nat')->nullable();
            $table->string('rccm')->nullable();
            $table->string('province')->nullable();
            $table->string('ville')->nullable();
            $table->string('commune')->nullable();
            $table->string('quartier')->nullable();
            $table->string('avenue')->nullable();
            $table->string('numero')->nullable();
            $table->string('pays')->nullable();
            $table->string('manager_name')->nullable();
            $table->string('humain_ressource')->nullable();


            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('');
    }
};
