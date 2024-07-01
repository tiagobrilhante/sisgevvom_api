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
                    'idt' => '024359107-4',
                    'password' => Hash::make('123456'),
                    'nome_completo' => 'Usuário Administrador de Teste',
                    'nome_guerra' => 'Administrador',
                    'posto_grad_id' => 5,
                    'sexo' => 'Masculino',
                    'data_nasc' => '1980-03-27',
                    'data_praca' => '1995-01-12',
                    'data_pronto_om' => '2010-11-12',
                    'email' => 'testeemail@gmail.com',
                    'reset' => false,
                    'homologado' => true,
                    'om_id' => 1
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
                    'homologado' => false,
                    'om_id' => 1
                ],
                [
                    'id' => 3,
                    'cpf' => '700.895.130-29',
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
                    'homologado' => false,
                    'om_id' => 2
                ]
            ]
        );
    }
}

