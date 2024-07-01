<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FuncaoUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('funcao_user')->insert([
                [
                    'id'=>1,
                    'funcao_id' => 3,
                    'user_id' => 1
                ],
                [
                    'id'=>2,
                    'funcao_id' => 6,
                    'user_id' => 2
                ],
                [
                    'id'=>3,
                    'funcao_id' => 7,
                    'user_id' => 3
                ],

            ]
        );
    }
}
