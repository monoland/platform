<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use BeyondCode\LaravelWebSockets\Server\Router;
use BeyondCode\LaravelWebSockets\Apps\AppProvider;
use BeyondCode\LaravelWebSockets\Console\CleanStatistics;
use BeyondCode\LaravelWebSockets\Console\StartWebSocketServer;
use BeyondCode\LaravelWebSockets\Console\RestartWebSocketServer;
use BeyondCode\LaravelWebSockets\WebSockets\Channels\ChannelManager;
use BeyondCode\LaravelWebSockets\Dashboard\Http\Controllers\SendMessage;
use BeyondCode\LaravelWebSockets\Dashboard\Http\Controllers\ShowDashboard;
use BeyondCode\LaravelWebSockets\Dashboard\Http\Controllers\AuthenticateDashboard;
use BeyondCode\LaravelWebSockets\Dashboard\Http\Controllers\DashboardApiController;
use BeyondCode\LaravelWebSockets\WebSockets\Channels\ChannelManagers\ArrayChannelManager;
use BeyondCode\LaravelWebSockets\Statistics\Http\Middleware\Authorize as AuthorizeStatistics;
use BeyondCode\LaravelWebSockets\Statistics\Http\Controllers\WebSocketStatisticsEntriesController;

class WebsocketServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('websockets.router', function () {
            return new Router();
        });

        $this->app->singleton(ChannelManager::class, function ($app) {
            $config = $app['config']['websockets'];

            return ($config['channel_manager'] ?? null) !== null && class_exists($config['channel_manager'])
                ? app($config['channel_manager']) : new ArrayChannelManager();
        });

        $this->app->singleton(AppProvider::class, function ($app) {
            $config = $app['config']['websockets'];

            return app($config['app_provider']);
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this
            ->registerRoutes()
            ->registerDashboardGate();

        $this->loadViewsFrom(resource_path('views/websocket/'), 'websockets');

        $this->commands([
            StartWebSocketServer::class,
            CleanStatistics::class,
            RestartWebSocketServer::class,
        ]);
    }

    protected function registerRoutes()
    {
        Route::prefix(config('websockets.path'))->group(function () {
            Route::middleware(config('websockets.middleware', [AuthorizeDashboard::class]))->group(function () {
                Route::get('/', ShowDashboard::class);
                Route::get('/api/{appId}/statistics', [DashboardApiController::class,  'getStatistics']);
                Route::post('auth', AuthenticateDashboard::class);
                Route::post('event', SendMessage::class);
            });

            Route::middleware(AuthorizeStatistics::class)->group(function () {
                Route::post('statistics', [WebSocketStatisticsEntriesController::class, 'store']);
            });
        });

        return $this;
    }

    protected function registerDashboardGate()
    {
        Gate::define('viewWebSocketsDashboard', function ($user = null) {
            return app()->environment('local');
        });

        return $this;
    }
}
