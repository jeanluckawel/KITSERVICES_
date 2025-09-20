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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('employee_id')->unique();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('middle_name')->nullable();
            $table->string('personal_id')->nullable();
            $table->date('birth_date')->nullable();
            $table->string('gender')->nullable();
            $table->string('marital_status')->nullable();
            $table->string('highest_education_level')->nullable();
            $table->string('nationality')->nullable();
            $table->string('photo')->nullable();
            $table->integer('age')->nullable();
//          Address
            $table->string('house_phone')->nullable();
            $table->string('mobile_phone')->nullable();
            $table->string('email')->nullable();
            $table->string('address1')->nullable();
            $table->string('address2')->nullable();
            $table->string('city')->nullable();
            $table->integer('status')->default(1);

//          emergency
            $table->string('emergency_full_name')->nullable();
            $table->string('emergency_relationship')->nullable();
            $table->string('emergency_mobile_phone')->nullable();
            $table->string('emergency_address')->nullable();
            $table->string('emergency_city')->nullable();

//            Spouse
            $table->string('father_name')->nullable();
            $table->string('father_name_status')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('mother_name_status')->nullable();
            $table->string('spouse_name')->nullable();
            $table->string('spouse_phone')->nullable();
            $table->date('spouse_birth_date')->nullable();



            // Enterprise
            $table->string('department')->nullable();
            $table->string('function')->nullable();
            $table->string('niveau')->nullable();
            $table->string('echelon')->nullable();
            $table->string('contract_type')->nullable();
            $table->string('taux_horaire_brut')->nullable();
            $table->string('situation_avant_embauche')->nullable();
            $table->decimal('salaire_mensuel_brut', 10, 2)->nullable();


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
