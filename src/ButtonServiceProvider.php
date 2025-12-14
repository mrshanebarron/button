<?php

namespace MrShaneBarron\Button;

use Illuminate\Support\ServiceProvider;
use MrShaneBarron\Button\Livewire\Button;
use MrShaneBarron\Button\View\Components\Button as BladeButton;
use Livewire\Livewire;

class ButtonServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/ld-button.php', 'ld-button');
    }

    public function boot(): void
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'ld-button');

        // Register Livewire component
        Livewire::component('ld-button', Button::class);

        // Register Blade component
        $this->loadViewComponentsAs('ld', [
            BladeButton::class,
        ]);

        if ($this->app->runningInConsole()) {
            // Publish config
            $this->publishes([
                __DIR__ . '/../config/ld-button.php' => config_path('ld-button.php'),
            ], 'ld-button-config');

            // Publish views
            $this->publishes([
                __DIR__ . '/../resources/views' => resource_path('views/vendor/ld-button'),
            ], 'ld-button-views');

            // Publish Vue components
            $this->publishes([
                __DIR__ . '/../resources/js/vue' => resource_path('js/vendor/laraveldesign/button'),
            ], 'ld-button-vue');
        }
    }
}
