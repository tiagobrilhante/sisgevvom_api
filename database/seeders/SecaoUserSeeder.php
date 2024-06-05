<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SecaoUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('secao_user')->insert([
                [
                    'id'=>1,
                    'secao_id' => 1,
                    'user_id' => 1
                ],
                [
                    'id'=>2,
                    'secao_id' => 2,
                    'user_id' => 2
                ],

            ]
        );
    }
}
