<p align="center"><img src="https://emi.edu.bo/images/Logos_EMI/logo_emi.png"></p>

## EMI - Starter Backend

Este repositorio contiene la configuración, dependencias y archivos escenciales para comenzar un proyecto nuevo de acuerdo a las Políticas de Estandarización de Desarrollo de la Escuela Militar de Ingeniería

## Requisitos

1. Apache, PHP 7.3 o superior, Postgres 11.0

Los pasos para realizar el despliegue son:

- copiar el archivo .env.suggested  a.env
- configurar conexión a la base de datos en el archivo .env
- composer install
- php artisan migrate --seed
- php artisan passport:install
- php artisan key:generate
- Si estas trabajando en ambiente linux otorgar permisos de escritura a las carpetas **storate/logs** y **storage/framework**
- php artisan serve
- abrir en el navegador http://localhost:8000 
- abrir en un rest client (Postman Insomnia) **usuario:** admin@change.me  **contraseña:** escuela

## Créditos

Este usa los siguientes repositorios:

- **[Laravel](https://laravel.com/)**
- **[Laravel Datatables](https://datatables.yajrabox.com/)**

## Vulnerabilidades de Seguridad

Si encuentras alguna vulnerabilidad de seguridad, por favor envía un email a la Dirección Nacional de Tecnologías de Información y Comunicación via [dticemi@adm.emi.edu.bo] (mailto:dticemi@adm.emi.edu.bo). 

## Licencia

Este proyecto es de código abierto y licenciado bajor [MIT license](https://opensource.org/licenses/MIT).