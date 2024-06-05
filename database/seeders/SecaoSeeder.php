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
                    'nome' => 'Seção de Tecnologia da Informação',
                    'sigla'=>'STI'
                ],
                [
                    'id'=>2,
                    'nome' => 'Ajudância Geral',
                    'sigla' => 'Aj G'
                ],

            ]
        );
    }
}
