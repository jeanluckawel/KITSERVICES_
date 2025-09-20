<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         User::factory()->create();

        User::factory()->create([
            'name' => 'Kit Services',
            'email' => 'info@kitservices.com',
        ]);

        $this->call([
            CustomerSeeder::class,
//            EmployeeSeeder::class,
        ]);
    }
}
