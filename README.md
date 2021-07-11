<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

## Pre-requisitos :pencil:

- PHP : ≥7.2.
- [Composer](https://getcomposer.org/download/).
- [Node.Js](https://nodejs.org/es//).
- [Git](https://git-scm.com/).
  
## Instalación :clipboard:

1. Abrir  la consola de comandos de Git (Windows) o la Terminal en sistemas basados en Unix (Mac o Linux) y posicionare en el directorio raíz.
2. Después Ejecutar el siguiente comando:  
```
git clone https://github.com/Carlosvergara99/Prueba_practica.git
```
.
3. Luego debe ingresar a la carpeta del proyecto y ejecutar ejecuta el comando:
```
composer install
```
4. El siguiente paso es copiar el contenido del archivo **.env.example** en un nuevo archivo con el nombre **.env** , para eso debemos situarnos dentro del proyecto y ejecutar el siguiente comando:
 
```
cp .env.example .env

```
5. Generar APP_KEY, Para generar la **APP_KEY** del proyecto ejecuta el siguiente comando: 
```
php artisan key:generate

```

6. Crear una base de datos .
7. [Configurar la base de datos](https://richos.gitbooks.io/laravel-5/content/capitulos/chapter3.html)
8. Ejecutar las migraciones con el siguiente comando:

```
php artisan migrate

```


9. Para ejecutar la aplicación se recomienda abrir una nueva terminal,situarse dentro del proyecto y ejecutar el siguiente comando:
```
 php artisan serve

```

## Autor

Carlos Vergara


