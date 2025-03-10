# Operacion **W3BTLaravelKit**

## La operacion de atras de escena del comando:
```sh
php artisan w3btlaravelkit:install
```
### Lo que hace el comando es instalar y configurar los paquetes de forma automatica para su uso inmediato, veremos a continuación el orden de instalacion y lo que se ejecuta para la configuracion correcta:

## ✅ [Laravel Livewire](https://livewire.laravel.com)

### 1-Se ejecuta el instalador de composer:
```bash
composer require livewire/livewire
```
### 2-Se ejecuta el archivo de configuracion del paquete:
```bash
php artisan livewire:publish --config
```
### 3-Se publican los activos de **Laravel-Livewire** para manejo de **JavaScript** de lado del servidor de ser necesario:
```bash
php artisan livewire:publish --assets
```
### 4-Se actualiza el archivo **composer.json** del proyecto raiz en la parte de: **post-update-cmd** para actualizaciones automaticas y se inserta:
```bash
"@php artisan vendor:publish --tag=livewire:assets --ansi --force"
```
### 5-Se public los archivos stubs para su futuro manejo de ser necesario en actualizaciones de diseño de los componentes **Laravel-Livewire**:
```bash
php artisan livewire:stubs
```
### 6-Se crea la plantilla prouesta por **Laravel-Livewire** para el correcto funcionamiento del paquete:
```bash
php artisan livewire:layout
```
### 7-Se instala el componente **Laravel-LivewireVolt** del repositorio de composer:
```bash
composer require livewire/volt
```
### 8-Se ejecuta el comando de instalacion de **Laravel-LivewireVolt** para su uso si es deseado:
```bash
php artisan volt:install
```
### 9-Se actuializa la plantilla de diseño de **Laravel-Livewire** para que pueda ser utilizada tanto por el paquete asi como por:
#### 1-Vite.js.
#### 2-DaisyUI.
#### 3-BladeUI.
#### 4-Fonts.bunny
#### 5-FontsAwesome.
### Vista general de la plantilla modificada:
```bash
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <meta name="description" content="{{ $description ?? '' }}">
    <meta name="keywords" content="{{ $keywords ?? '' }}">
    <meta name="author" content="{{ $author ?? '' }}">
    <link rel="shortcut icon" href="{{ asset('assets/img/') }}" type="image/x-icon">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/8b186f73b9.js" crossorigin="anonymous"></script>

    @livewireStyles
    @bukStyles
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    {{ $slot }}
    @livewireScripts
    @bukScripts
</body>

</html>
```
## 🎨 [DaisyUI](https://daisyui.com)
### 10-Se instala **daisyUI** de su repositorio oficial, de forma automatica se instala la ultima version de **TailWind.CSS** y **Vite.JS**:
```bash
npm install tailwindcss@latest @tailwindcss/vite@latest daisyui@latest
```
### 11-Cambio en el codio del archivo **vite.config.js** para que pueda manejar, **tailwind.css** y pueda ser aprovechado tanto por el proyecto raiz asi por **Laravel-Modules** para el manejo correcto de los activos **Front-end**:
```bash
import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';
import { fileURLToPath, URL } from 'url';
import fs from 'fs';
import path from 'path';

function collectModuleAssetsPaths(basePath, moduleDir) {
    const modulesPath = path.resolve(basePath, moduleDir);
    
    if (!fs.existsSync(modulesPath)) {
        return [];
    }

    const moduleFolders = fs.readdirSync(modulesPath);
    
    return moduleFolders.flatMap(folder => {
        const jsPath = path.resolve(modulesPath, folder, 'resources/js/app.js');
        const cssPath = path.resolve(modulesPath, folder, 'resources/css/app.css');
        
        return [
            fs.existsSync(jsPath) ? jsPath : null,
            fs.existsSync(cssPath) ? cssPath : null
        ].filter(Boolean); // Filtra los valores null en caso de que no existan archivos
    });
}

// Directorio base de resources
const resourcesPath = fileURLToPath(new URL('./resources', import.meta.url));

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                ...collectModuleAssetsPaths(resourcesPath, '../Modules')
            ],
            refresh: true,
        }),
        tailwindcss(), // Se agrega el plugin de Tailwind CSS 4 para Vite
    ],
    resolve: {
        alias: {
            '@': path.resolve(__dirname, 'resources/js'),
        },
    },
});
```