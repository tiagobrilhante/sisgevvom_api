<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostogradSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('postograds')->insert([
                [
                    'id'=>1,
                    'posto_grad' => 'Gen Ex',
                    'hierarquia' => 1
                ],
                [
                    'id'=>2,
                    'posto_grad' => 'Gen Div',
                    'hierarquia' => 2
                ],
                [
                    'id'=>3,
                    'posto_grad' => 'Gen Bda',
                    'hierarquia' => 3
                ],
                [
                    'id'=>4,
                    'posto_grad' => 'Cel',
                    'hierarquia' => 4
                ],
                [
                    'id'=>5,
                    'posto_grad' => 'TC',
                    'hierarquia' => 5
                ],
                [
                    'id'=>6,
                    'posto_grad' => 'Maj',
                    'hierarquia' => 6
                ],

            ]
        );
    }
}
