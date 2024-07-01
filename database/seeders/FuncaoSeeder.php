<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FuncaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('funcaos')->insert([

                [
                    'id' => 1,
                    'nome' => 'Cmt CMA',
                    'secao_id' => 1
                ],
                [
                    'id' => 2,
                    'nome' => 'E7',
                    'secao_id' => 3
                ],
                [
                    'id' => 3,
                    'nome' => 'Chefe',
                    'secao_id' => 5
                ],
                [
                    'id' => 4,
                    'nome' => 'Adjunto 1',
                    'secao_id' => 5
                ],
                [
                    'id' => 5,
                    'nome' => 'Auxiliar 1',
                    'secao_id' => 5
                ],
                [
                    'id' => 6,
                    'nome' => 'Ajudante Geral',
                    'secao_id' => 6
                ],
                [
                    'id' => 7,
                    'nome' => 'E2',
                    'secao_id' => 8
                ],

            ]
        );
    }
}
