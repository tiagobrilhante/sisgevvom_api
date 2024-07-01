<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EnderecoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('enderecos')->insert([
                [
                    'id'=>1,
                    'rua' => 'Rua de Testes',
                    'numero' => '1234',
                    'complemento' => 'Complemento Geral',
                    'bairro' => 'São Jorge',
                    'cidade' => 'Manaus',
                    'estado' => 'AM',
                    'cep' => '69.000-000',
                    'user_id' => 1,
                ],
            ]
        );
    }
}
