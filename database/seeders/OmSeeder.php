<?php

namespace Database\Seeders;

use App\Models\Om;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class OmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('oms')->insert([
            [
                'id' => 1,
                'nome' => 'Comando Militar da Amazônia',
                'sigla' => 'CMA',
                'om_pai' => 1
            ],
            [
                'id' => 2,
                'nome' => 'Companhia de Comando do Comando Militar da Amazônia',
                'sigla' => 'Cia C/ CMA',
                'om_pai' => 1
            ],
            [
                'id' => 3,
                'nome' => '4º Centro Telemático de Área',
                'sigla' => '4º CTA',
                'om_pai' => 1
            ]
        ]);
    }
}
