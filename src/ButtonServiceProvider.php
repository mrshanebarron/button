<?php

namespace MrShaneBarron\Button;

use Illuminate\Support\ServiceProvider;

class ButtonServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/button.php', 'ld-button');
    }

    public function boot(): void
    {
        if (class_exists(\Livewire\Livewire::class)) {
            \Livewire\Livewire::component('ld-button', Livewire\Button::class);
        }

        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'ld-button');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/button.php' => config_path('ld-button.php'),
            ], 'ld-button-config');
        }
    }
}
