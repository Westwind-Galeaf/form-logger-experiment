<?php

namespace App\Console\Commands;

use App\Models\Service;
use Illuminate\Support\Str;
use Illuminate\Console\Command;

class RegistrationServiceCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'service:register';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Register a new service';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $service = $this->makeService($this->ask('Service name'));

        $this->table(
            ['Service name', 'Secret key'],
            [
                [$service->name, $service->key]
            ]
        );
    }

    /**
     * Создание сервиса.
     *
     * @param $name
     * @return mixed
     */
    public function makeService($name)
    {
        return Service::create(['name' => $name, 'key' => Str::uuid()->toString()]);
    }
}
