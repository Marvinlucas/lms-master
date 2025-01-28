<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class RefreshDatabaseWithSeed extends Command
{
    protected $signature = 'db:refresh-seed';
    protected $description = 'Refresh the database and seed with fresh data';

    public function handle()
    {
        $this->call('migrate:refresh');
        $this->call('db:seed');
    }
}
