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
                [
                    'id'=>7,
                    'posto_grad' => 'Cap',
                    'hierarquia' => 7
                ],
                [
                    'id'=>8,
                    'posto_grad' => '1º Ten',
                    'hierarquia' => 8
                ],
                [
                    'id'=>9,
                    'posto_grad' => '2º Ten',
                    'hierarquia' => 9
                ],
                [
                    'id'=>10,
                    'posto_grad' => 'ASP',
                    'hierarquia' => 10
                ],
                [
                    'id'=>11,
                    'posto_grad' => 'ST',
                    'hierarquia' => 11
                ],
                [
                    'id'=>12,
                    'posto_grad' => '1º Sgt',
                    'hierarquia' => 12
                ],
                [
                    'id'=>13,
                    'posto_grad' => '2º Sgt',
                    'hierarquia' => 13
                ],
                [
                    'id'=>14,
                    'posto_grad' => '3º Sgt',
                    'hierarquia' => 14
                ],
                [
                    'id'=>15,
                    'posto_grad' => 'Cb',
                    'hierarquia' => 15
                ],
                [
                    'id'=>16,
                    'posto_grad' => 'Sd',
                    'hierarquia' => 16
                ],
                [
                    'id'=>17,
                    'posto_grad' => 'SC',
                    'hierarquia' => 17
                ]
            ]
        );
    }
}
