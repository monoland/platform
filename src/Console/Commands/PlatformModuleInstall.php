<?php

namespace Monoland\Platform\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;

class PlatformModuleInstall extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'module:install
        {module}
    ';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Make monosoft module install';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        /** GET MODULE INFO */
        $modules = Cache::get('modules');

        if (is_array($modules) && array_key_exists($this->argument('module'), $modules)) {
            $module = $modules[$this->argument('module')];
        } else {
            $this->error('The module not exists.');
            return;
        }

        /** GET SEEDER PATTERN */
        // {NAMESPACE}{MODULE}\Seeders\{MODULE}BaseSeeder
        // {NAMESPACE}{MODULE}\Seeders\{MODULE}UserSeeder
        
        $moduleSeeder = $module->namespace . $module->name . '\\Seeders\\' . $module->name;

        if (class_exists($moduleBaseSeeder = $moduleSeeder . 'BaseSeeder')) {
            with(new $moduleBaseSeeder())->run();
        }

        if (class_exists($moduleUserSeeder = $moduleSeeder . 'UserSeeder')) {
            with(new $moduleUserSeeder())->run();
        }
    }
}
