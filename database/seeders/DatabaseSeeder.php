<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            SecaoSeeder::class,
            PostogradSeeder::class,
            UserSeeder::class,
            SecaoUserSeeder::class,
            EnderecoSeeder::class,
            ContatoSeeder::class
        ]);
    }
}
