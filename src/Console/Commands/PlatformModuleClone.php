<?php

namespace Monoland\Platform\Console\Commands;

use ErrorException;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use InvalidArgumentException;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Monoland\Platform\Console\Commands\PlatformModuleHelper;

class PlatformModuleClone extends PlatformModuleHelper
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'module:clone
        {repository} {--by=}
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
        $mode    = env('PLATFORM_MODE', 'prod');
        $is_prod = $mode == 'prod';
        $module_name = $this->buildModuleName($this->argument('repository'));
        $by          = $this->option('by');

        try {
            // -> check if module already exist
            if ($this->isModuleExist($module_name))
                return $this->info('Module already exist!!');

            // -> procced to clone
            $this->info('Trying to clone..');
            $output = $this->cloneModule($this->argument('repository'));
            if ($output instanceof ProcessFailedException) throw $output;

            // -> procced to fetch
            $this->call('module:fetch', ['module' => $module_name]);

            // -> proceed to do the operation for production mode
            if (is_null($by) && $is_prod || $by == 'tag')
                $this->call('module:checkout', ['module' => $module_name, '--by' => 'tag', '--nofetch' => 'true']);
            // -> proceed to do the operation for dev mode        
            if (is_null($by) && !$is_prod || $by == 'commit')
                $this->call('module:checkout', ['module' => $module_name, '--by' => 'commit', '--nofetch' => 'true']);
            // -> proceed to mode invalid, have option to delete the module     
            if ($mode != 'dev' && $mode != 'prod' && $this->confirm('Do you want to delete the cloned module ?'))
                $this->call('module:delete', ['module' => $module_name]);

            // -> Get into conclusions, if exist then cloned succesfully
            if ($this->isModuleExist($module_name)) $this->info('Module cloned succesfully!!');
        } catch (ErrorException $error) {
            return $this->error($error->getMessage());
        }
    }
}
