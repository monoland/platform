<?php

namespace Monoland\Platform\Console\Commands;

use Illuminate\Console\Command;

class PlatformInstall extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'platform:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install monoland platform';

    /**
     * handle function
     *
     * @return void
     */
    public function handle()
    {
        $this->call('vendor:publish', [
            '--tag' => 'platform-frontend',
            '--force' => true
        ]);

        $this->call('module:clone', [
            'repository' => 'https://github.com/monoland/system'
        ]);
    }
}