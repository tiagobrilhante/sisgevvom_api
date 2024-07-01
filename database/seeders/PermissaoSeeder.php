<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('permissaos')->insert([

                [
                    'id' => 1,
                    'permissao' => 'Usuário',
                    'funcao_id' => 1
                ],
                [
                    'id' => 2,
                    'permissao' => 'Usuário',
                    'funcao_id' => 2
                ],
                [
                    'id' => 3,
                    'permissao' => 'Administrador Geral',
                    'funcao_id' => 3
                ],
                [
                    'id' => 4,
                    'permissao' => 'Administrador Geral',
                    'funcao_id' => 4
                ],
                [
                    'id' => 5,
                    'permissao' => 'Administrador Geral',
                    'funcao_id' => 5
                ],
                [
                    'id' => 6,
                    'permissao' => 'Usuário',
                    'funcao_id' => 6
                ],
                [
                    'id' => 7,
                    'permissao' => 'Usuário',
                    'funcao_id' => 7
                ],

            ]
        );
    }
}
