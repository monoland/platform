<?php

namespace Monoland\Platform;

use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Resources\Json\JsonResource;
use Monoland\Platform\Console\Commands\PlatformMakeJob;
use Monoland\Platform\Console\Commands\PlatformMakeSeed;
use Monoland\Platform\Console\Commands\PlatformMakeEvent;
use Monoland\Platform\Console\Commands\PlatformMakeModel;
use Monoland\Platform\Console\Commands\PlatformMakeExport;
use Monoland\Platform\Console\Commands\PlatformMakeImport;
use Monoland\Platform\Console\Commands\PlatformMakeModule;
use Monoland\Platform\Console\Commands\PlatformMakePolicy;
use Monoland\Platform\Console\Commands\PlatformModuleList;
use Monoland\Platform\Console\Commands\PlatformModuleSeed;
use Monoland\Platform\Console\Commands\PlatformMakeCommand;
use Monoland\Platform\Console\Commands\PlatformMakeReplica;
use Monoland\Platform\Console\Commands\PlatformMakeListener;
use Monoland\Platform\Console\Commands\PlatformMakeResource;
use Monoland\Platform\Console\Commands\PlatformMakeMigration;
use Monoland\Platform\Console\Commands\PlatformModuleInstall;
use Monoland\Platform\Console\Commands\PlatformModuleMigrate;
use Monoland\Platform\Console\Commands\PlatformMakeController;
use Monoland\Platform\Console\Commands\PlatformMakeNotification;

class PlatformServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        /** Disable wrapping of the outer-most resource array. */
        JsonResource::withoutWrapping();

        /** Prevent model relationships from being lazy loaded. */
        Model::preventLazyLoading();
        
        /** Register Platform Command */
        $this->registerArtisanCommands();

        /** Register Modules */
        if (Cache::has('modules')) {
            $modules = Cache::get('modules');
        } else {
            $modules = $this->scanModulesFolder();
        }

        foreach ($modules as $module) {
            if (!File::exists(base_path('modules' . DIRECTORY_SEPARATOR . str($module->name)->lower()))) {
                continue;
            }

            if ($module->providers && is_array($module->providers)) {
                foreach ($module->providers as $provider) {
                    if (class_exists($provider)) {
                        with(new $provider($this->app))->boot();
                        with(new $provider($this->app))->register();
                    }
                }
            } else {
                if (class_exists($module->providers)) {
                    with(new $module->providers($this->app))->boot();
                    with(new $module->providers($this->app))->register();
                }
            }
        }

        /** Publish File and Folder */
        $this->publishes([
            __DIR__.'/../resources' => resource_path(),
            __DIR__.'/../modules' => base_path('modules'),
            __DIR__.'/../.eslintrc.js' => base_path('.eslintrc.js'),
            __DIR__.'/../package.json' => base_path('package.json'),
            __DIR__.'/../vite.config.mjs' => base_path('vite.config.js'),
        ], 'platform-frontend');
    }

    /**
     * Register any application services.
     */
    public function register(): void
    {
        URL::forceScheme('https');
    }

    /**
     * scanModulesFolder function
     *
     * @return array
     */
    protected function scanModulesFolder(): array
    {
        return Cache::rememberForever('modules', function () {
            $modules = [];

            $files = glob(
                base_path('modules' . DIRECTORY_SEPARATOR . "*" . DIRECTORY_SEPARATOR . 'module.json')
            );

            foreach ($files as $file) {
                $arr = json_decode(file_get_contents($file), true);

                $modules[$arr['name']] = json_decode(json_encode($arr), false);
            }

            return $modules;
        });
    }

    /**
     * registerArtisanCommands function
     *
     * @return void
     */
    protected function registerArtisanCommands(): void
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                PlatformMakeCommand::class,
                PlatformMakeController::class,
                PlatformMakeEvent::class,
                PlatformMakeExport::class,
                PlatformMakeImport::class,
                PlatformMakeJob::class,
                PlatformMakeListener::class,
                PlatformMakeMigration::class,
                PlatformMakeModel::class,
                PlatformMakeModule::class,
                PlatformMakeNotification::class,
                PlatformMakePolicy::class,
                PlatformMakeReplica::class,
                PlatformMakeResource::class,
                PlatformMakeSeed::class,
                PlatformModuleInstall::class,
                PlatformModuleList::class,
                PlatformModuleMigrate::class,
                PlatformModuleSeed::class
            ]);
        }
    }
}
