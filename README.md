

# Instrucciones despliegue

Instalar paquetes de servidor web php (Xampp o Wampp).
Instalar Composer. 
Instalar funciones Laravel desde consola: "composer global require "laravel/installer"
Crear una base de datos local (Xampp o Wamp) llamada: "test_azurian" usuario: "root" sin contraseña.
Iniciar servicios Xampp o Wampp, apache y MySQL.
Desde consola en la carpeta del repositorio "testAzurianBack" ejecutar el comando:"composer install".
Luego ejecutar "php artisan migrate --seed" para la creación de las tablas en la base de datos y agregar credenciales de usuario.
A continuación, en consola ejecutar "php artisan serve" para desplegar. 
Si desea comprobar que se esté ejecutando sin errores ir a la url: http://localhost:8000, acá el navegador mostrara el logotipo de Laravel y algunos accesos directos a su web.
Para hacer las pruebas de la api, utilizar el frontend "testAzurianFront" repositorio: https://github.com/Edwar531/testAzurianFront.git