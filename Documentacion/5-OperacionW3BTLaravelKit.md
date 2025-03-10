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
#### 1-Vite.js
#### 2-BladeUI
```bash
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <meta name="description" content="{{ \$description ?? '' }}">
    <meta name="keywords" content="{{ \$keywords ?? '' }}">
    <meta name="author" content="{{ \$author ?? '' }}">
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