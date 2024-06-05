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
                    'rua' => 'Rua A',
                    'numero' => '123',
                    'complemento' => 'teste de complemento',
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
