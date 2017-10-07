<?php

namespace Bestmomo\LaravelEmailConfirmation\Commands;

use Illuminate\Console\Command;

class AuthCommand extends Command
{

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'confirmation:auth';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Scaffold basic login and registration views with confirmation alerts';

    /**
     * The views that need to be exported.
     *
     * @var array
     */
    protected $views = [
        'auth/login.stub' => 'auth/login.blade.php',
        'auth/register.stub' => 'auth/register.blade.php',
    ];

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        $this->exportViews();

        $this->info('Authentication scaffolding for confirmation generated successfully.');
    }

    /**
     * Export the authentication views.
     *
     * @return void
     */
    protected function exportViews()
    {
        foreach ($this->views as $key => $value) {
            copy(
                __DIR__.'/stubs/views/'.$key,
                base_path('resources/views/'.$value)
            );
        }
    }
}
