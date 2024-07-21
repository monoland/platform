<?php

namespace Monoland\Platform\Console\Commands;

use ErrorException;
use Illuminate\Console\Command;
use InvalidArgumentException;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Monoland\Platform\Services\PlatformModulesGit;

class PlatformModuleDelete extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'module:delete
        {module?}
    ';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete modules by its name';

    /**
     * handle function
     *
     * @return void
     */
    public function handle(PlatformModulesGit $ModulesGit)
    {
        try {
            // try to getting needed argument
            $module = $this->argument('module');

            // try to getting the correct modules if not found..
            if (!$ModulesGit->isModuleExist($module)) return $this->info('Module not found');

            // delete           
            if (!$this->confirm(
                "Confirm to delete the targeted module.. \n" .
                    "Module Name        : $module \n" .
                    "Targeted Directory : " . $ModulesGit->buildModuleDir($module) . "\n"
            )) {
                return $this->info('Delete Cancelled');
            }

            // action
            $success = $ModulesGit->deleteModule($module);
            if ($success)               return $this->info('Delete Success');
            else if (is_null($success)) return $this->info('Delete Canceled');
            else if (!$success)         return $this->info('Delete Failed');
        } catch (InvalidArgumentException $error) {
            return $this->error($error->getMessage());
        } catch (ErrorException $error) {
            return $this->error($error->getMessage());
        } catch (ProcessFailedException $error) {
            return $this->error($error->getMessage());
        }
    }
}
