<?php

namespace w3btlaravelkit\Providers;

use Livewire\Livewire;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use App\Livewire\W3BTLaravelKit\UI\ToastComponent;
use w3btlaravelkit\Commands\InstallW3BTLaravelKit;
use w3btlaravelkit\Commands\MakeLivewireModuleComponent;
use App\View\Components\W3BTLaravelKit\UI\ButtonComponent;

class W3BTLaravelKitServiceProvider extends ServiceProvider
{
    /**
     * Inicia los servicios del paquete.
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                InstallW3BTLaravelKit::class,
                MakeLivewireModuleComponent::class,
            ]);

            // 📌 Publicar Clases y Vistas de componentes en el Proyecto Laravel
            $this->publishes([
                __DIR__.'/../Stubs/app/View/Components/W3BTLaravelKit/UI/ButtonComponent.php' 
                    => app_path('View/Components/W3BTLaravelKit/UI/ButtonComponent.php'),
            
                __DIR__.'/../Stubs/app/Livewire/W3BTLaravelKit/UI/ToastComponent.php' 
                    => app_path('Livewire/W3BTLaravelKit/UI/ToastComponent.php'),
            
                __DIR__.'/../Stubs/resources/views/components/w3btlaravelkit/ui/button-component.blade.php' 
                    => resource_path('views/components/w3btlaravelkit/ui/button-component.blade.php'),
            
                __DIR__.'/../Stubs/resources/views/livewire/ui/toast-component.blade.php' 
                    => resource_path('views/livewire/w3btlaravelkit/ui/toast-component.blade.php'),
            ], 'w3btlaravelkit-components');
        }

        // ✅ Registrar Componentes Blade solo si existen
        if (class_exists(ButtonComponent::class)) {
            Blade::component('w3btlaravelkit-button', ButtonComponent::class);
        }

        // ✅ Registrar Componentes Livewire solo si existen
        if (class_exists(ToastComponent::class)) {
            Livewire::component('w3btlaravelkit.toast', ToastComponent::class);
        }
    }
}
