<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class RefreshDatabaseCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'migrate:refresh-ignore-fk';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Refresh migrations and seed database ignoring foreign key checks';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        // Desabilitar verificações de chave estrangeira
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // Executar o comando migrate:refresh --seed
        $this->call('migrate:refresh', [
            '--seed' => true,
        ]);

        // Reabilitar verificações de chave estrangeira
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
