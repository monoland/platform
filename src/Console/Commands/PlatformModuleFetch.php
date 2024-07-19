<?php

namespace Monoland\Platform\Console\Commands;

use ErrorException;
use Illuminate\Process\Exceptions\ProcessFailedException;
use Monoland\Platform\Console\Commands\PlatformModuleHelper;

class PlatformModuleFetch extends PlatformModuleHelper
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
    public function handle()
    {
        try {
            // try to getting the correct modules if not found..
            $module = $this->handleModuleNotFound($this->argument('module'));
            if (!$this->isModuleExist($module)) return $module;

            // try to fetch            
            $this->info('Trying to fetch.. ' . $module);
            $output = $this->fetchModule($module);
            if ($output instanceof ProcessFailedException) throw $output;
        } catch (ErrorException $error) {
            return $this->error($error->getMessage());
        }
    }
}
