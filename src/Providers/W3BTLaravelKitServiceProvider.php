<?php

namespace w3btlaravelkit\Providers;

use Livewire\Livewire;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use App\Livewire\W3BTLaravelKit\UI\ToastComponent;
use w3btlaravelkit\Commands\InstallW3BTLaravelKit;
use App\View\Components\W3BTLaravelKit\UI\LinkComponent;
use w3btlaravelkit\Commands\MakeLivewireModuleComponent;
use App\Livewire\W3BTLaravelKit\UI\SessionFlashComponent;
use App\View\Components\W3BTLaravelKit\UI\ButtonComponent;
use App\Livewire\W3BTLaravelKit\UI\CheckboxToggleComponent;
use App\View\Components\W3BTLaravelKit\UI\InputDateComponent;
use App\View\Components\W3BTLaravelKit\UI\InputFileComponent;
use App\View\Components\W3BTLaravelKit\UI\InputTextComponent;
use App\View\Components\W3BTLaravelKit\UI\PaginatorComponent;
use App\View\Components\W3BTLaravelKit\UI\InputTextAreaComponent;
use App\View\Components\W3BTLaravelKit\UI\ThemeDropdownComponent;
use App\View\Components\W3BTLaravelKit\UI\InputTextLowerComponent;
use App\View\Components\W3BTLaravelKit\UI\InputTextReadOnlyComponent;

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
                // 📌 Button Component
                __DIR__ . '/../Stubs/app/View/Components/W3BTLaravelKit/UI/ButtonComponent.php'
                => app_path('View/Components/W3BTLaravelKit/UI/ButtonComponent.php'),

                // 📌 Blade Button Component Views
                __DIR__ . '/../Stubs/resources/views/components/w3btlaravelkit/ui/buttoncomponent.blade.php'
                => resource_path('views/components/w3btlaravelkit/ui/buttoncomponent.blade.php'),

                // 📌 InputDate Component
                __DIR__ . '/../Stubs/app/View/Components/W3BTLaravelKit/UI/InputDateComponent.php'
                => app_path('View/Components/W3BTLaravelKit/UI/InputDateComponent.php'),

                // 📌 Blade InputDate Component Views
                __DIR__ . '/../Stubs/resources/views/components/w3btlaravelkit/ui/inputdatecomponent.blade.php'
                => resource_path('views/components/w3btlaravelkit/ui/inputdatecomponent.blade.php'),

                // 📌 InputFile Component
                __DIR__ . '/../Stubs/app/View/Components/W3BTLaravelKit/UI/InputFileComponent.php'
                => app_path('View/Components/W3BTLaravelKit/UI/InputFileComponent.php'),

                // 📌 Blade InputFile Component Views
                __DIR__ . '/../Stubs/resources/views/components/w3btlaravelkit/ui/inputfilecomponent.blade.php'
                => resource_path('views/components/w3btlaravelkit/ui/inputfilecomponent.blade.php'),

                // 📌 InputTextArea Component
                __DIR__ . '/../Stubs/app/View/Components/W3BTLaravelKit/UI/InputTextAreaComponent.php'
                => app_path('View/Components/W3BTLaravelKit/UI/InputTextAreaComponent.php'),

                // 📌 Blade InputTextArea Component Views
                __DIR__ . '/../Stubs/resources/views/components/w3btlaravelkit/ui/inputtextareacomponent.blade.php'
                => resource_path('views/components/w3btlaravelkit/ui/inputtextareacomponent.blade.php'),

                // 📌 InputText Component
                __DIR__ . '/../Stubs/app/View/Components/W3BTLaravelKit/UI/InputTextComponent.php'
                => app_path('View/Components/W3BTLaravelKit/UI/InputTextComponent.php'),

                // 📌 Blade InputText Component Views
                __DIR__ . '/../Stubs/resources/views/components/w3btlaravelkit/ui/inputtextcomponent.blade.php'
                => resource_path('views/components/w3btlaravelkit/ui/inputtextcomponent.blade.php'),

                // 📌 InputTextLower Component
                __DIR__ . '/../Stubs/app/View/Components/W3BTLaravelKit/UI/InputTextLowerComponent.php'
                => app_path('View/Components/W3BTLaravelKit/UI/InputTextLowerComponent.php'),

                // 📌 Blade InputTextLower Component Views
                __DIR__ . '/../Stubs/resources/views/components/w3btlaravelkit/ui/inputtextlowercomponent.blade.php'
                => resource_path('views/components/w3btlaravelkit/ui/inputtextlowercomponent.blade.php'),

                // 📌 InputTextReadOnly Component
                __DIR__ . '/../Stubs/app/View/Components/W3BTLaravelKit/UI/InputTextReadOnlyComponent.php'
                => app_path('View/Components/W3BTLaravelKit/UI/InputTextReadOnlyComponent.php'),

                // 📌 Blade InputTextReadOnly Component Views
                __DIR__ . '/../Stubs/resources/views/components/w3btlaravelkit/ui/inputtextreadonlycomponent.blade.php'
                => resource_path('views/components/w3btlaravelkit/ui/inputtextreadonlycomponent.blade.php'),

                // 📌 Link Component
                __DIR__ . '/../Stubs/app/View/Components/W3BTLaravelKit/UI/LinkComponent.php'
                => app_path('View/Components/W3BTLaravelKit/UI/LinkComponent.php'),

                // 📌 Blade Link Component Views
                __DIR__ . '/../Stubs/resources/views/components/w3btlaravelkit/ui/linkcomponent.blade.php'
                => resource_path('views/components/w3btlaravelkit/ui/linkcomponent.blade.php'),

                // 📌 Paginator Component
                __DIR__ . '/../Stubs/app/View/Components/W3BTLaravelKit/UI/PaginatorComponent.php'
                => app_path('View/Components/W3BTLaravelKit/UI/PaginatorComponent.php'),

                // 📌 Blade Paginator Component Views
                __DIR__ . '/../Stubs/resources/views/components/w3btlaravelkit/ui/paginatorcomponent.blade.php'
                => resource_path('views/components/w3btlaravelkit/ui/paginatorcomponent.blade.php'),

                // 📌 ThemeDropdown Component
                __DIR__ . '/../Stubs/app/View/Components/W3BTLaravelKit/UI/ThemeDropdownComponent.php'
                => app_path('View/Components/W3BTLaravelKit/UI/ThemeDropdownComponent.php'),

                // 📌 Blade ThemeDropdown Component Views
                __DIR__ . '/../Stubs/resources/views/components/w3btlaravelkit/ui/themedropdowncomponent.blade.php'
                => resource_path('views/components/w3btlaravelkit/ui/themedropdowncomponent.blade.php'),

                // 📌 Livewire CheckboxToggle Component
                __DIR__ . '/../Stubs/app/Livewire/W3BTLaravelKit/UI/CheckboxToggleComponent.php'
                => app_path('Livewire/W3BTLaravelKit/UI/CheckboxToggleComponent.php'),

                // 📌 Livewire checkbox-toggle-component Views
                __DIR__ . '/../Stubs/resources/views/livewire/w3btlaravelkit/ui/checkbox-toggle-component.blade.php'
                => resource_path('views/livewire/w3btlaravelkit/ui/checkbox-toggle-component.blade.php'),

                // 📌 Livewire Toast Component
                __DIR__ . '/../Stubs/app/Livewire/W3BTLaravelKit/UI/ToastComponent.php'
                => app_path('Livewire/W3BTLaravelKit/UI/ToastComponent.php'),

                // 📌 Livewire ToastComponent Views
                __DIR__ . '/../Stubs/resources/views/livewire/w3btlaravelkit/ui/toast-component.blade.php'
                => resource_path('views/livewire/w3btlaravelkit/ui/toast-component.blade.php'),

                // 📌 Livewire Session Flash Component
                __DIR__ . '/../Stubs/app/Livewire/W3BTLaravelKit/UI/SessionFlashComponent.php'
                => app_path('Livewire/W3BTLaravelKit/UI/SessionFlashComponent.php'),

                // 📌 Livewire SessionFlashComponent Views
                __DIR__ . '/../Stubs/resources/views/livewire/w3btlaravelkit/ui/session-flash-component.blade.php'
                => resource_path('views/livewire/w3btlaravelkit/ui/session-flash-component.blade.php'),
            ], 'w3btlaravelkit-components');
        }

        // ✅ Registrar Componentes Blade solo si existen
        if (class_exists(ButtonComponent::class)) {
            Blade::component('w3btlaravelkit-button', ButtonComponent::class);
        }

        if (class_exists(InputDateComponent::class)) {
            Blade::component('w3btlaravelkit-inputDate', InputDateComponent::class);
        }

        if (class_exists(InputFileComponent::class)) {
            Blade::component('w3btlaravelkit-inputFile', InputFileComponent::class);
        }

        if (class_exists(InputTextAreaComponent::class)) {
            Blade::component('w3btlaravelkit-inputTextArea', InputTextAreaComponent::class);
        }

        if (class_exists(InputTextComponent::class)) {
            Blade::component('w3btlaravelkit-inputText', InputTextComponent::class);
        }

        if (class_exists(InputTextLowerComponent::class)) {
            Blade::component('w3btlaravelkit-inputTextLower', InputTextLowerComponent::class);
        }

        if (class_exists(InputTextReadOnlyComponent::class)) {
            Blade::component('w3btlaravelkit-inputTextReadOnly', InputTextReadOnlyComponent::class);
        }

        if (class_exists(LinkComponent::class)) {
            Blade::component('w3btlaravelkit-link', LinkComponent::class);
        }

        if (class_exists(PaginatorComponent::class)) {
            Blade::component('w3btlaravelkit-paginator', PaginatorComponent::class);
        }

        if (class_exists(ThemeDropdownComponent::class)) {
            Blade::component('w3btlaravelkit-theme', ThemeDropdownComponent::class);
        }

        // ✅ Registrar Componentes Livewire solo si existen
        if (class_exists(ToastComponent::class)) {
            Livewire::component('w3btlaravelkit.toast', ToastComponent::class);
        }

        if (class_exists(CheckboxToggleComponent::class)) {
            Livewire::component('w3btlaravelkit.toast', CheckboxToggleComponent::class);
        }

        if (class_exists(SessionFlashComponent::class)) {
            Livewire::component('w3btlaravelkit.toast', SessionFlashComponent::class);
        }
    }
}
