<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class StartAppCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:start';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Start the application using one running command';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Starting run migration');
        Artisan::call('migrate');

        $this->info('Starting run seeder');
        Artisan::call('db:seed');

        // Start queue worker in the background
        $this->info('Starting queue worker in the background');
        exec('php artisan queue:work > /dev/null 2>&1 &');

        $this->info('Starting Laravel application on port 8000');
        Artisan::call('serve', ['--port' => 8000]);

        $this->info('Application started successfully.');

    }
}
