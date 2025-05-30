<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Http\View\Composers\PageSettingComposer;
use Illuminate\Notifications\ChannelManager;
use App\Notifications\Channels\MailtrapChannel;
use App\Services\MailtrapApiService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(MailtrapApiService::class, function ($app) {
            return new MailtrapApiService();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Register view composer for public layout
        View::composer('layouts.app', PageSettingComposer::class);

        app(ChannelManager::class)->extend('mailtrap', function ($app) {
            return new MailtrapChannel($app->make(MailtrapApiService::class));
        });
    }
    
}
