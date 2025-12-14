<?php

namespace MrShaneBarron\Button;

use Illuminate\Support\ServiceProvider;

class ButtonServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/button.php', 'sb-button');
    }

    public function boot(): void
    {
        if (class_exists(\Livewire\Livewire::class)) {
            \Livewire\Livewire::component('sb-button', Livewire\Button::class);
        }

        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'sb-button');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/button.php' => config_path('sb-button.php'),
            ], 'sb-button-config');
        }
    }
}
