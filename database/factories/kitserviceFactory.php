<?php

namespace Database\Factories;

use App\Models\kitservice;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class kitserviceFactory extends Factory
{
    protected $model = kitservice::class;

    public function definition(): array
    {
        return [
            'company_name' => 'Kit Service Sarl',
            'phone' => '00243 977 333 977',
            'website' => 'www.kitservice.net',
            'id_nat' => '05-H5300-N876458R',
            'rccm' => 'CD/LSH/RCCM/20-B-00584',
            'province' => 'Lualaba',
            'ville' => 'Kolwezi',
            'commune' => 'Manika',
            'quartier' => 'Mutoshi',
            'avenue' => 'Kamina',
            'numero' => '1627 B',
            'pays' => 'RDC',

            'manager_name' => 'KUZO NELLY',
            'humain_ressource' => 'BANZA GLORY',


        ];
    }
}
