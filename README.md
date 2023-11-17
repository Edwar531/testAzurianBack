# Instrucciones despliegue en hosting
Ejecutar deste el terminal en la carpeta principal el comando "npm install"  
Editar en el archivo .env los valores "DB_DATABASE DB_USERNAME DB_PASSWORD" con respecto a la base de datos a utilizar.
Crear la base de datos e importar el archivo test_azurian.sql ubicado en la carpeta principal
Subir la carpeta al dominio deseado, para comprobar que funciona correctamente ingresar a https://dominio.com/public/api/prueba
Realizar el resto de pruebas desde el frontend "testAzurianFront" repositorio: https://github.com/Edwar531/testAzurianFront.git

# Instrucciones despliegue local
Instalar paquetes de servidor web php (Xampp o Wampp).
Instalar Composer. 
Instalar funciones Laravel desde consola: "composer global require "laravel/installer"
Crear una base de datos local (Xampp o Wamp) llamada: "test_azurian" usuario: "root" sin contraseña, o con otras especificaciones, en caso de hacer la segunda opción. editar en el archivo .env los valores "DB_DATABASE DB_USERNAME DB_PASSWORD" con respecto a la base de datos a utilizar.
Iniciar servicios Xampp o Wampp, apache y MySQL.
Desde consola en la carpeta del repositorio "testAzurianBack" ejecutar el comando:"composer install".
Luego ejecutar "php artisan migrate --seed" para la creación de las tablas en la base de datos y agregar credenciales de usuario a la base de datos asignada.
A continuación, en consola ejecutar "php artisan serve" para desplegar. 
Si desea comprobar que se esté ejecutando sin errores ir a la url: http://localhost:8000/api/prueba.
Realizar el resto de pruebas desde el frontend "testAzurianFront" repositorio: https://github.com/Edwar531/testAzurianFront.git
