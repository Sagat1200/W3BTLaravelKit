<?php

namespace w3btlaravelkit\Providers;

use Illuminate\Support\ServiceProvider;
use w3btlaravelkit\Commands\InstallW3BTLaravelKit;
use w3btlaravelkit\Commands\MakeLivewireModuleComponent;

class W3BTLaravelKitServiceProvider extends ServiceProvider
{
     /**
     * Inicia los servicios del paquete.
     */
    public function boot()
    {
        // Registrar comandos
        if ($this->app->runningInConsole()) {
            $this->commands([
                InstallW3BTLaravelKit::class,
                MakeLivewireModuleComponent::class,
            ]);
        }
    }
}