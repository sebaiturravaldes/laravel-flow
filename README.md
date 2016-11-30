# Laravel Flow
Integración en Laravel con la pasarela de pago [Flow](http://www.flow.cl)

## Instalación

### Paso 1: Instalar a través de Composer

```sh
$ composer require siturra/flow
```

### Paso 2: Service Provider

Una vez que Composer haya instalado o actualizado sus paquetes, deberá registrar Laravel-Flow. Abra `config/app.php` y agregue la siguiente linea en el array `providers`:
```php
'providers' => array(
    …
	Siturra\Flow\FlowServiceProvider::class,
    …
),
```

### Paso 3: Agregar el Alias

En el archivo `config/app.php`, agregar la siguiente línea al array `aliases`:
```php
'aliases' => array(
    …
	'Flow' => Siturra\Flow\FlowFacade::class,
    …
),
```

### Paso 4: Publicar el archivo de configuración.

El siguiente comando migra las carpetas `storage`, `config`, `resource`, del paquete `Siturra\Flow` a tu directorio raíz de laravel, de esta manera aparecera:
- el archivo `config/flow.php`
- la carpeta `flow`, en `resource/views`.
- las carpetas de `log` y `keys` del kit de integración, en la carpeta `storage`.

```sh
$ php artisan vendor:publish --tag=flow
```

### Paso 5: Configura `config/flow.php`.

### Paso 6: Certificado Digital
Tus certificados digitales deben ir en: `storage/app/flow/keys`.

## Utilización

Este paquete es un simple Service Provider adaptado a Laravel del [Kit de Integración de Flow](https://www.flow.cl/apiFlow.php).

### Agregar a tu `routes`, las siguientes rutas:

```php
<?php
...
Route::group(['prefix' => 'payment/flow'], function(){
    Route::get('index', 'FlowController@index');
    Route::post('orden', 'FlowController@orden');
    Route::get('confirm', 'FlowController@confirm');
    Route::match(['get', 'post'], 'success', 'FlowController@success');
    Route::match(['get', 'post'], 'failure', 'FlowController@failure');
    Route::post('index', 'FlowController@orden');
});
...
?>
```

### Excluir protección CSRF

**Importante:** [Excluye la protección CSRF](https://laravel.com/docs/master/csrf#csrf-excluding-uris) para las páginas de éxito, fracaso y confirmación, ya que provocan excepciones al comunicarse con Flow.

Abrir el archivo `app/Http/Middleware/VerifyCsrfToken.php`

```php
<?php
...
protected $except = [
        //
        'payment/*',
    ];
...
?>
```
