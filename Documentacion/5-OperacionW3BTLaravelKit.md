# Operacion **W3BTLaravelKit**

## La operacion de atras de escena del comando:
```sh
php artisan w3btlaravelkit:install
```
### Instalar y configurar los paquetes de forma automatica para su uso inmediato, veremos a continuación el orden de instalacion y lo que se ejecuta para la configuracion correcta:

## ✅ [Laravel Livewire](https://livewire.laravel.com)

### Se ejecuta el instalador de composer:
```bash
composer require livewire/livewire
```
### Se ejecuta el archivo de configuracion del paquete:
```bash
php artisan livewire:publish --config
```
### Se publican los activos de **Laravel-Livewire** para manejo de **JavaScript** de lado del servidor de ser necesario:
```bash
php artisan livewire:publish --assets
```
### Se actualiza el archivo **composer.json** del proyecto raiz en la parte de: **post-ipdate-cmd** y se inserta:
```bash
"@php artisan vendor:publish --tag=livewire:assets --ansi --force"
```
### Se public los archivos stubs para su futuro manejo de ser necesario en actualizaciones de diseño de los componentes **Laravel-Livewire**:
```bash
php artisan livewire:stubs
```