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
            OmSeeder::class,
            SecaoSeeder::class,
            FuncaoSeeder::class,
            PostogradSeeder::class,
            UserSeeder::class,
            SecaoUserSeeder::class,
            FuncaoUserSeeder::class,
            EnderecoSeeder::class,
            PermissaoSeeder::class,
            TelefoneSeeder::class
        ]);
    }
}
