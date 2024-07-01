<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SecaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('secaos')->insert([

                [
                    'id'=>1,
                    'nome' => 'Comando do CMA',
                    'sigla'=>'Cmdo CMA',
                    'om_id'=>1,
                    'secao_pai'=>1
                ],
                [
                    'id'=>2,
                    'nome' => 'Estado Maior Geral',
                    'sigla'=>'EMG',
                    'om_id'=>1,
                    'secao_pai'=>1
                ],
                [
                    'id'=>3,
                    'nome' => '7ª Seção',
                    'sigla'=>'7S',
                    'om_id'=>1,
                    'secao_pai'=>2
                ],
                [
                    'id'=>4,
                    'nome' => 'Estado Maior Especial',
                    'sigla'=>'EMEsp',
                    'om_id'=>1,
                    'secao_pai'=>1
                ],
                [
                    'id'=>5,
                    'nome' => 'Seção de Tecnologia da Informação',
                    'sigla'=>'STI',
                    'om_id'=>1,
                    'secao_pai'=>4
                ],
                [
                    'id'=>6,
                    'nome' => 'Ajudância Geral',
                    'sigla' => 'Aj G',
                    'om_id'=>1,
                    'secao_pai'=>4
                ],
                [
                    'id'=>7,
                    'nome' => 'Estado Maior',
                    'sigla' => 'EM',
                    'om_id'=>2,
                    'secao_pai'=>7
                ],
                [
                    'id'=>8,
                    'nome' => '2ª Seção',
                    'sigla' => 'S2',
                    'om_id'=>2,
                    'secao_pai'=>7
                ],

            ]
        );
    }
}
