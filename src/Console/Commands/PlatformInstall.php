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
        $this->addExtraForMerge();
        
        $this->call('vendor:publish', [
            '--tag' => 'platform-frontend',
            '--force' => true
        ]);

        $this->call('module:clone', [
            'repository' => 'https://github.com/monoland/system'
        ]);
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    protected function addExtraForMerge(): void
    {
        $composerFile = base_path('composer.json');

        $content = json_decode(file_get_contents($composerFile), true);

        if(!array_key_exists('merge-plugin', $content['extra'])) {
            $content['extra']['merge-plugin'] = [
                'include' => [
                    "modules/*/composer.json"
                ]
            ];

            $content = json_encode($content, JSON_PRETTY_PRINT);
            $content = str_replace('\/', '/', $content);

            file_put_contents($composerFile, $content);
        }
    }
}