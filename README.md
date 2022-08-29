# Prueba Técnica JTSec

**1. Entorno de desarrollo**
- Apache 2.4.47
- PHP 8.1.9
- Laravel v9.26.1 
- MySQL 8.0.30
- PHPMyAdmin 5.2.0
- VSCode 1.70.2

**2. Creación e importación de la base de datos**

//TODO : Realizar la instalación desde una copia de github

Se creará la base de datos con el nombre ptjtsec, cuyo cotejamiento será utf8mb4_spanish2_ci. En mi caso he realizado la creación desde PHPMyAdmin.
Una vez que se haya creado la base de datos, debemos realizar las configuración necesarias en nuestro archivo `.env` .

Tras realizar el proceso anterior, debemos ejecutar el comando `php artisan migrate` para migrar todas las tablas de nuestro proyecto.

Además se ha incluido varios seeders a modo de ejemplo para que la tabla contengan datos de pruebas, para añadir los datos ejecutaremos
el comando `php artisan db:seed` .

**3. Visualización de los datos en una vista**

Aunque no era necesario, se ha añadido a modo de visualización una vista que realiza los casos de uso.

