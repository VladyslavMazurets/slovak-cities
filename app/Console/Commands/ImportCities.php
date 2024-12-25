<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ImportCities extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:import-cities';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import cities and municipalities from Nitra region from e-obce.sk';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
    }
}
