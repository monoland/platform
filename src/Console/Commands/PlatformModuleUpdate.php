<?php

namespace Monoland\Platform\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Process\Process;

class PlatformModuleUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'module:update
        {repository}
    ';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update the selected module for the newest tags or commits';

    /**
     * handle function
     *
     * @return void
     */
    public function handle()
    {
    }
}
