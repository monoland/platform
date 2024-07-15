<?php

namespace Monoland\Platform\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Process\Process;

class PlatformModuleClone extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'module:clone
        {repository}
    ';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clone git repository to modules folder';

    /**
     * handle function
     *
     * @return void
     */
    public function handle()
    {
        $process = new Process([
            'git', 'clone', $this->argument('repository')
        ]);

        $process->setWorkingDirectory(base_path() . DIRECTORY_SEPARATOR . 'modules');
        $process->run();
    }
}
