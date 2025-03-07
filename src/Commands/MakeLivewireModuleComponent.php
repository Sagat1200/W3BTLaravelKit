<?php

namespace w3btlaravelkit\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

class MakeLivewireModuleComponent extends Command
{
    protected $signature = 'w3btlaravelkit:livewire-module {module} {name}';
    protected $description = 'Crea un componente Livewire dentro de un módulo y lo registra automáticamente en el ServiceProvider.';

    public function handle()
    {
        $module = strtolower($this->argument('module')); // Convertimos el módulo a minúsculas
        $name = $this->argument('name'); // Permitimos subdirectorios
        $filesystem = new Filesystem();

        // Ruta base de los módulos
        $modulesPath = base_path('Modules');

        // Verificar que la carpeta de módulos existe
        if (!is_dir($modulesPath)) {
            $this->error("❌ No se encontró la carpeta de módulos en: {$modulesPath}");
            return;
        }

        // Buscar el módulo con su nombre correcto en "Modules/"
        $moduleCorrectName = null;
        foreach (scandir($modulesPath) as $folder) {
            if (strtolower($folder) === $module) {
                $moduleCorrectName = $folder;
                break;
            }
        }

        if (!$moduleCorrectName) {
            $this->error("❌ El módulo '{$module}' no existe en {$modulesPath}.");
            return;
        }

        $modulePath = "{$modulesPath}/{$moduleCorrectName}";

        // Convertir el nombre en partes (para subdirectorios)
        $pathParts = explode('/', $name);
        $className = ucfirst(array_pop($pathParts)); // Último elemento será el nombre de la clase
        $subPath = implode('/', array_map('ucfirst', $pathParts)); // Convertir cada parte a PascalCase
        $namespacePath = implode('\\', array_map('ucfirst', $pathParts)); // Para el namespace

        // Generar el namespace completo
        $namespace = "Modules\\{$moduleCorrectName}\\Livewire" . ($namespacePath ? "\\{$namespacePath}" : '');

        // Rutas para la clase y la vista Livewire
        $livewirePath = "{$modulePath}/app/Livewire" . ($subPath ? "/{$subPath}" : '');
        $livewireClass = "{$livewirePath}/{$className}.php";

        // Asegurar que el directorio exista
        if (!$filesystem->exists($livewirePath)) {
            $filesystem->makeDirectory($livewirePath, 0755, true, true);
        }

        // Crear la clase Livewire
        $componentClassContent = <<<PHP
        <?php

        namespace {$namespace};

        use Livewire\Component;

        class {$className} extends Component
        {
            public function render()
            {
                return view('{$module}::livewire.{$this->convertToKebabCase($name)}');
            }
        }
        PHP;

        $filesystem->put($livewireClass, $componentClassContent);

        // Crear la vista Blade
        $viewPath = "{$modulePath}/resources/views/livewire/" . strtolower(str_replace('/', '/', $name));
        $viewFile = "{$viewPath}.blade.php";

        if (!$filesystem->exists(dirname($viewFile))) {
            $filesystem->makeDirectory(dirname($viewFile), 0755, true);
        }

        $viewContent = <<<BLADE
        <div>
            <h1>Componente Livewire: {$className}</h1>
        </div>
        BLADE;

        $filesystem->put($viewFile, $viewContent);

        // Generar la línea para registrar el componente en el ServiceProvider
        $componentTag = "{$module}::" . $this->convertToKebabCase($name);
        $serviceProviderLine = "Livewire::component('{$componentTag}', \\{$namespace}\\{$className}::class);";

        // Mensajes en la terminal con detalles
        $this->info("\n✅ Componente Livewire creado en el módulo '{$moduleCorrectName}' 🎉");
        $this->info("-------------------------------------------------------------");
        $this->info("📂 Ubicación de la clase Livewire:");
        $this->line("   {$livewireClass}");

        $this->info("\n📂 Ubicación de la vista Blade:");
        $this->line("   {$viewFile}");

        $this->info("\n🛠 Para renderizar el componente en una vista Blade, usa:");
        $this->line("   <livewire:{$componentTag} />");

        $this->info("\n📌 Para registrar el componente en el ServiceProvider, agrega esta línea:");
        $this->line("   {$serviceProviderLine}");

        $this->info("\n-------------------------------------------------------------\n");
    }

    private function convertToKebabCase($string)
    {
        return strtolower(str_replace('/', '.', $string));
    }

}