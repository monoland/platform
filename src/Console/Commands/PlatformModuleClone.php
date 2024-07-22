<?php

namespace Monoland\Platform\Console\Commands;

use ErrorException;
use Monoland\Platform\Services\PlatformModulesGit;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Illuminate\Console\Command;

class PlatformModuleClone extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'module:clone
        {repository} 
        {--by-commit}
        {--by-tag}
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
    public function handle(PlatformModulesGit $ModulesGit)
    {
        $mode    = env('APP_ENV', 'local');
        $module_name = $ModulesGit->buildModuleName($this->argument('repository'));
        $byCommit = $this->option('by-commit');
        $byTag = $this->option('by-tag');

        try {
            // -> check if module already exist
            if ($ModulesGit->isModuleExist($module_name))
                return $this->info('Module already exist!!');

            // -> procced to clone
            $this->info('Trying to clone..');
            $output = $ModulesGit->cloneModule($this->argument('repository'));
            if ($output instanceof ProcessFailedException) throw $output;

            // -> procced to fetch
            $this->call('module:fetch', ['module' => $module_name]);

            // -> proceed to do the operation for production mode
            if ($byTag && !$byCommit)
                $this->call('module:checkout', ['module' => $module_name, '--by-tag' => true, '--nofetch' => 'true']);
            // -> proceed to do the operation for dev mode        
            if ($byCommit && !$byTag)
                $this->call('module:checkout', ['module' => $module_name, '--by-commit' => true, '--nofetch' => 'true']);
            // -> proceed to mode invalid, have option to delete the module     
            if ($mode !== 'local' && $mode !== 'production' && $this->confirm('Do you want to delete the cloned module ?'))
                $this->call('module:delete', ['module' => $module_name]);

            // -> Get into conclusions, if exist then cloned succesfully
            if ($ModulesGit->isModuleExist($module_name)) $this->info('Module cloned succesfully!!');
        } catch (ErrorException $error) {
            return $this->error($error->getMessage());
        }
    }
}
