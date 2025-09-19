<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class CustomerSeeder extends Seeder
{
    public function run(): void
    {
        $clients = [
            [
                'name' => 'KAMOA COPPER SA',
                'id_nat' => '05-B0500-N37233J',
                'rccm' => '14-B-1683',
                'nif' => 'A0901048A',
                'province' => 'Lualaba',
                'ville' => 'Kolwezi',
                'commune' => 'Manika',
                'quartier' => 'Joli-Site',
                'avenue' => 'Route Likasi',
                'numero' => '999',
                'telephone' => '+243996072600',
                'email' => 'communications@kamoacopper.com',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ];

        DB::table('customers')->insert($clients);
    }
}
