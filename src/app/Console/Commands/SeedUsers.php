<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\UserService;


class SeedUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'users:seed';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetching users from API then seeding rows into database every 8 hours';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        $this->info('Seeding users command init is processing');

        $urls = [
            'https://60e1b5fc5a5596001730f1d6.mockapi.io/api/v1/users/users_1',
            'https://60e1b5fc5a5596001730f1d6.mockapi.io/api/v1/users/user_2'
        ];

        UserService::seed($urls);
        

        $this->info('Seeding users is completed!');
    }
}
