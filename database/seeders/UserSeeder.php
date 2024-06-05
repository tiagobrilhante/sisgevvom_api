<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
                [
                    'id' => 1,
                    'cpf' => '512.490.302-34',
                    'idt' => '013056804-1',
                    'password' => Hash::make('123456'),
                    'nome_completo' => 'Tiago da Silva Brilhante',
                    'nome_guerra' => 'Brilhante',
                    'posto_grad_id' => 5,
                    'sexo' => 'Masculino',
                    'data_nasc' => '1980-05-26',
                    'data_praca' => '1998-02-28',
                    'data_pronto_om' => '2012-01-10',
                    'email' => 'tiagobrilhantemania@gmail.com',
                    'reset' => false
                ],
                [
                    'id' => 2,
                    'cpf' => '838.985.550-03',
                    'idt' => null,
                    'password' => Hash::make('123456'),
                    'nome_completo' => null,
                    'nome_guerra' => null,
                    'posto_grad_id' => null,
                    'sexo' => null,
                    'data_nasc' => null,
                    'data_praca' => null,
                    'data_pronto_om' => null,
                    'email' => null,
                    'reset' => true,
                ]
            ]
        );
    }
}

