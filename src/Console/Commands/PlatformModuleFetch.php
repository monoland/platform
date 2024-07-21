<?php

namespace Monoland\Platform\Console\Commands;

use ErrorException;
use Illuminate\Console\Command;
use Illuminate\Process\Exceptions\ProcessFailedException;
use Monoland\Platform\Services\PlatformModulesGit;

class PlatformModuleFetch extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'module:fetch {module?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch git repository to targeted module';

    /**
     * handle function
     *
     * @return void
     */
    public function handle(PlatformModulesGit $ModulesGit)
    {
        try {
            // try to getting the correct modules if not found..
            $module = $this->argument('module');
            if (!$ModulesGit->isModuleExist($module)) return $this->info("Modules not found");

            // try to fetch            
            $this->info('Trying to fetch.. ' . $module);
            $output = $ModulesGit->fetchModule($module);
            if ($output instanceof ProcessFailedException) throw $output;
        } catch (ErrorException $error) {
            return $this->error($error->getMessage());
        }
    }
}
