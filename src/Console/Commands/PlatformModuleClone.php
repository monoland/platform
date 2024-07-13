<?php

namespace Monoland\Platform\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Process;

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
        Process::path(base_path())->quietly()->run('cd modules; git clone ' . $this->argument('repository'));
    }
}
