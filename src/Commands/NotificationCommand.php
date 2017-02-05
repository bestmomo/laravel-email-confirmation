<?php

namespace Bestmomo\LaravelEmailConfirmation\Commands;

use Illuminate\Console\GeneratorCommand;

class NotificationCommand extends GeneratorCommand
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'confirmation:notification';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Publish confirmation notification';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Confirmation Notification';

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return __DIR__.'/stubs/Notifications/ConfirmEmail.stub';
    }

    /**
     * Get the desired class name from the input.
     *
     * @return string
     */
    protected function getNameInput()
    {
        return 'ConfirmEmail';
    }

    /**
     * Get the default namespace for the class.
     *
     * @param  string  $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace.'\Notifications';
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return [];
    }
}
