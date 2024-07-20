<?php

namespace Monoland\Platform\Console\Commands;

use ErrorException;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;
use InvalidArgumentException;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Monoland\Platform\Console\Commands\PlatformModuleHelper;

class PlatformModuleDelete extends PlatformModuleHelper
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
    public function handle()
    {
        try {
            // try to getting needed argument
            $module = $this->argument('module');

            // try to getting the correct modules if not found..
            $module = $this->handleModuleNotFound($module);
            if (!$this->isModuleExist($module)) return $module;

            // delete           
            $success = $this->deleteModule($module);
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
