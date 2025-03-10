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
### 4-Se actualiza el archivo **composer.json** del proyecto raiz en la parte de: **post-update-cmd** y se inserta:
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
### 8-Se ejecuta el comando de instalacion de **Laravel-LivewireVolt**:
```bash
php artisan volt:install
```