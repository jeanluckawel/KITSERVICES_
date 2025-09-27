<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FunctionSeeder extends Seeder
{
    public function run(): void
    {
        $departments = DB::table('departments')->pluck('id', 'name')->toArray();

        $functions = [
            'Supply Chain' => [
                'Issuer/Receiver',
                'Material Controller',
                'Officer, Warehousing',
                'Operator, Utility Vehicle',
                'Officer, Fuel Management',
                'Assistant, Fuel & Lubes',
                'Clerk, Procurement',
                'Officer, Procurement',
                'Managerial Leader I, Supply Chain',
                'Supervisor, Warehousing',
                'Supervisor, Procurement',
                'Supervisor, Transport',
                'Supervisor, Fleet Maintenance',
            ],
            'HR Management' => [
                'Clerk, HR Administration',
                'Senior HR Manager',
                'Officer, HR Administration & Recruitment',
                'Officer, HR Manning',
                'Superintendent II, HR Shafts',
                'Nurse Occupational Health',
                'Senior Superintendent I, Health',
            ],
            'Engineering' => [
                'Assistant, Core Yard',
                'Superintendent II, Geotechnical Engineer',
                'Superintendent I, Hydrogeologist',
                'Team Leader, Roads & Access',
                'Artisan, Boilermaker',
                'Artisan, Auto Electrician',
                'Artisan, Fitter',
                'Artisan, Mason',
                'Assistant, Mechanic',
                'Foreman, Mechanical TMM',
                'Foreman, Electrical',
                'Artisan, Electrician',
                'Artisan, Welder',
                'Artisan, Diesel Mechanic',
                'Artisan, Heavy Equipment Mechanic',
                'Artisan, Instrumentation',
                'Artisan, Plumber',
                'Artisan, Rigger',
                'Artisan, Scaffolder',
                'Artisan, Painter',
                'Artisan, Refrigeration & Air Conditioning',
                'Artisan, Fitter & Turner',
                'Supervisor, Mechanical Maintenance',
                'Supervisor, Electrical Maintenance',
                'Supervisor, Heavy Equipment Maintenance',
                'Supervisor, Instrumentation Maintenance',
                'Supervisor, Civil Maintenance',
                'Supervisor, Roads & Access',
                'cleaner',
            ],
            'HSE' => [
                'HSE Manager',
                'Safety Officer',
                'Occupational Health & Safety Coordinator',
                'Safety Inspector',
                'HSE Trainer',
                'Emergency Response Coordinator',
                'Industrial Hygienist',
                'Data Analyst, HSE',
            ],
            'Construction' => [
                'Worker, Construction',
                'Foreman, Construction',
                'Clerk, Construction',
                'Painter',
                'Attendant, Carpenter',
                'Foreman, Salvage Yard',
            ],
            'Risk Control' => [
                'Risk Manager',
                'Compliance Officer',
                'Internal Auditor',
                'Risk Analyst',
                'Fraud Investigator',
                'Corporate Security Manager',
                'Insurance & Claims Officer',
            ],
            'Technical Training' => [
                'Training Coordinator',
                'Technical Instructor',
                'Apprenticeship Supervisor',
                'Training Officer',
                'Learning & Development Specialist',
                'Trainer, Safety Induction',
            ],
            'Finance' => [
                'Finance Manager',
                'Accountant',
                'Management Accountant',
                'Clerk, Accounts Payable',
                'Officer, Payroll',
                'Auditor',
                'Treasury Officer',
                'Financial Analyst',
                'Budget Controller',
            ],
            'Sales & Logistics' => [
                'Sales Manager',
                'Sales Representative',
                'Key Account Manager',
                'Customer Service Officer',
                'Logistics Coordinator',
                'Export/Import Officer',
                'Distribution Supervisor',
                'Sales Analyst',
                'Warehouse & Logistics Manager',
            ],
            'Employee Services' => [
                'Employee Relations Officer',
                'Wellness Coordinator',
                'Canteen Supervisor',
                'Housing & Accommodation Officer',
                'Recreation Officer',
                'Transport Coordinator',
                'Employee Services Clerk',
            ],
            'Technology' => [
                'IT Support Technician',
                'Systems Administrator',
                'Network Engineer',
                'Database Administrator',
                'Software Developer',
                'Cybersecurity Analyst',
                'Business Systems Analyst',
                'ERP Specialist',
            ],
            'HR Information Systems' => [
               'Clerk, Time & Attendance',
                'Officer, Time & Attendance',
                'Senior Officer, Time & Attendance',
                'Officer, HRIS',
                'Senior Officer, HRIS',
                'HRIS Manager',
                'HRIS Analyst',
                'HRIS Developer',
                'HRIS Support Specialist',
                'HRIS Trainer',
                'HRIS Data Analyst',
                'HRIS Project Manager',
                'Manager, HR Information Systems',
                'Supervisor, HR Information Systems',
            ],
            'Transformation' => [
                'Transformation Manager',
                'Diversity & Inclusion Officer',
                'Change Management Specialist',
                'Organizational Development Officer',
                'Workforce Planning Analyst',
                'Culture & Engagement Coordinator',
            ],
            'Corporate Communication' => [
                'Communication Manager',
                'Public Relations Officer',
                'Media Liaison Officer',
                'Corporate Affairs Specialist',
                'Content Creator',
                'Internal Communications Officer',
                'Community Engagement Officer',
                'Event Coordinator',
                'Social Media Manager',
                'Clerk, Corporate Communication',
            ],
        ];


        foreach ($functions as $departmentName => $jobTitles) {
            if (!isset($departments[$departmentName])) continue;

            $departmentId = $departments[$departmentName];

            foreach ($jobTitles as $title) {
                DB::table('fonctions')->updateOrInsert(
                    [
                        'name' => $title,
                        'department_id' => $departmentId
                    ]
                );
            }
        }
    }
}
