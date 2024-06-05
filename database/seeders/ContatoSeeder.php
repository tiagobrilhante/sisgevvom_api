<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('contatos')->insert([
                [
                    'id'=>1,
                    'telefone' => '+5592991554494',
                    'user_id' => 1,
                ],
            ]
        );
    }
}
