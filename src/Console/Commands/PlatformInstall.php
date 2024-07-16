<?php

namespace Monoland\Platform\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Filesystem\Filesystem;

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
        if (File::isDirectory(resource_path('js'))) {
            File::deleteDirectory(resource_path('js'));
        }

        if (File::isDirectory(resource_path('css'))) {
            File::deleteDirectory(resource_path('css'));
        }

        if (File::isDirectory(app_path('Models'))) {
            File::deleteDirectory(app_path('Models'));
        }

        if (File::isDirectory(database_path('migrations'))) {
            File::deleteDirectory(database_path('migrations'));

            File::makeDirectory(database_path('migrations'));
        }

        $this->addExtraForMerge();

        $this->addStatefulApi();

        $this->call('vendor:publish', [
            '--tag' => 'platform-frontend',
            '--force' => true
        ]);

        $this->call('module:clone', [
            'repository' => 'https://github.com/monoland/system'
        ]);
    }

    /**
     * addStatefulApi function
     *
     * @return void
     */
    protected function addStatefulApi()
    {
        $appFile = base_path('bootstrap' . DIRECTORY_SEPARATOR . 'app.php');
        $content = file_get_contents($appFile);

        if (str_contains($content, 'api: __DIR__.\'/../routes/api.php\',')) {
            return;
        }

        $this->call('install:api', [
            '--without-migration-prompt' => true
        ]);

        if (str_contains($content, '$middleware->statefulApi();')) {
            return;
        }

        if (str_contains($content, '->withMiddleware(function (Middleware $middleware) {')) {
            (new Filesystem)->replaceInFile(
                '->withMiddleware(function (Middleware $middleware) {',
                '->withMiddleware(function (Middleware $middleware) {' . PHP_EOL . "\t\t" . '$middleware->statefulApi();',
                $appFile,
            );
        }
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