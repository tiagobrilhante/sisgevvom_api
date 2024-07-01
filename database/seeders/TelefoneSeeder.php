<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TelefoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('telefones')->insert([

                [
                    'id'=>1,
                    'numero' => '(92) 9 9155-4494',
                    'funcional'=>false,
                    'user_id'=>1,
                ]
            ]
        );
    }
}
