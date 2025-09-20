<?php

namespace Database\Factories;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class EmployeeFactory extends Factory
{
    protected $model = Employee::class;

    public function definition(): array
    {
        return [
            'employee_id'            => 'KAM_KIT' . str_pad($this->faker->unique()->numberBetween(1, 9999), 4, '00', STR_PAD_LEFT),
            'first_name'             => $this->faker->firstName(),
            'last_name'              => $this->faker->lastName(),
            'middle_name'            => $this->faker->firstName(),
            'personal_id'            => strtoupper(Str::random(8)),
            'birth_date'             => $this->faker->date('Y-m-d', '-20 years'),
            'gender'                 => $this->faker->randomElement(['Male', 'Female']),
            'marital_status'         => $this->faker->randomElement(['Single', 'Married', 'Divorced']),
            'highest_education_level'=> $this->faker->randomElement(['High School', 'Bachelor', 'Master', 'PhD']),
            'nationality'            => 'Congolese',
            'photo'                  => null,
            'age'                    => $this->faker->numberBetween(20, 60),
            'house_phone'            => $this->faker->phoneNumber(),
            'mobile_phone'           => '2439' . $this->faker->numberBetween(10000000, 99999999),
            'email'                  => $this->faker->safeEmail(),
            'address1'               => $this->faker->streetAddress(),
            'address2'               => $this->faker->secondaryAddress(),
            'city'                   => $this->faker->city(),
            'status'                 => 1,

            // Emergency contact
            'emergency_full_name'    => $this->faker->name(),
            'emergency_relationship' => $this->faker->randomElement(['Father', 'Mother', 'Brother', 'Sister', 'Spouse', 'Friend']),
            'emergency_mobile_phone' => '2438' . $this->faker->numberBetween(10000000, 99999999),
            'emergency_address'      => $this->faker->streetAddress(),
            'emergency_city'         => $this->faker->city(),

            // Family info
            'father_name'            => $this->faker->name('male'),
            'father_name_status'     => $this->faker->randomElement(['Alive', 'Deceased']),
            'mother_name'            => $this->faker->name('female'),
            'mother_name_status'     => $this->faker->randomElement(['Alive', 'Deceased']),
            'spouse_name'            => $this->faker->optional()->name(),
            'spouse_phone'           => $this->faker->optional()->phoneNumber(),
            'spouse_birth_date'      => $this->faker->optional()->date('Y-m-d', '-18 years'),

            // Work info
            'department'             => $this->faker->randomElement(['Finance', 'HR', 'IT', 'Production', 'Maintenance']),
            'function'               => $this->faker->jobTitle(),
            'niveau'                 => $this->faker->randomElement(['N1', 'N2', 'N3']),
            'echelon'                => $this->faker->randomElement(['E1', 'E2', 'E3']),
            'contract_type'          => $this->faker->randomElement(['CDI', 'CDD', 'Stage']),
            'taux_horaire_brut'      => $this->faker->numberBetween(2800, 2900),
            'situation_avant_embauche' => $this->faker->randomElement(['Stagiaire','Chômeur','Étudiant','Étudiante','Travailleur']),
            'salaire_mensuel_brut'   => $this->faker->numberBetween(500, 3000),
        ];
    }
}
