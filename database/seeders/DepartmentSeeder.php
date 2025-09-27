<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    public function run(): void
    {
        $departments = [
            'Supply Chain',
            'HR Management',
            'Engineering',
            'HSE',
            'Construction',
            'Risk Control',
            'Technical Training',
            'Finance',
            'Sales & Logistics',
            'Employee Services',
            'Technology',
            'HR Information Systems',
            'Transformation',
            'Corporate Communication',
        ];


        foreach ($departments as $department) {
            \App\Models\Department::create(['name' => $department]);
        }
    }
}
