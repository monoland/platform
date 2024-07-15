<?php

namespace Monoland\Platform\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Process\Process;
use Illuminate\Support\Facades\Cache;

class PlatformModuleFetch extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'module:fetch';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Check if there's a new commit or new tags for each modules repositroy";

    /**
     * handle function
     *
     * @return void
     */
    public function handle()
    {
        $modules = [];

        // git ls-remote --heads | repo_url
        // git ls-remote --tags  | repo_url

        foreach (Cache::get('modules') as $module) {
            array_push($modules, [
                $module->namespace,
                $module->name,
                $module->repo_url,
                $module->repo_path,
            ]);
        }

        array_multisort(array_column($modules, 3), SORT_ASC, $modules);

        $this->table(
            ['Namespace', 'Name', 'Repo Url', 'Repo Path'],
            $modules
        );
    }
}
