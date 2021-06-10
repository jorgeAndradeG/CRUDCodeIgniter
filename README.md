# Crud de Usuarios

Crear el siguiente desarrollo utilizando el framework Codeigniter con PHP 7

1.	Crear CRUD (Crear, Mostrar, Editar, Borrar) usuario que tenga los siguientes parámetros

     a.	Nombre, apellido paterno y apellido Materno
 
     b.	Correo (es el identificador único) 

     c.	Telefono

2.	Crear modelo físico de la base de datos
3.	Login basado en correo y contraseña 
4.	Validar campos

## Tecnologías
El software está escrito en lenguaje PHP 7.4.12 hecho con el framework Codeigniter 4. El motor de base de datos utilizado en el desarrollo fue PHPMyAdmin, por lo que la base de datos está en lenguaje SQL.

## Configuración de arranque

El software se puede utilizar en Windows solo utilizando Xampp, mientras que si se quiere utilizar en Ubuntu/Linux se debería hacer un cambio en el archivo vendor\codeigniter4\framework\system\Codeigniter.php de la carpeta raíz del proyecto, el que es DESCOMENTAR la línea 184.

Windows
```php
184 //locale_set_default($this->config->defaultLocale ?? 'en');
```
Ubuntu/Linux
```php
184 locale_set_default($this->config->defaultLocale ?? 'en');
```
No ha sido probado en macOS.

## Configuración Base de Datos

Para poder hacer la conexión a la base de datos se debe configurar el archivo ```app\config\Database.php``` de la carpeta raíz del proyecto en las líneas 36,37 y 38:

``` php
       36  'username' => 'root',
       37  'password' => 'password',
       38  'database' => 'jorgeandrade',
```
 En la fila 36 se debe cambiar ```'root'``` por el nombre que tengas de usuario en tu PHPMyAdmin, al igual que el campo ```'password'``` donde va tu contraseña de PHPMyAdmin. En el campo ```''jorgeandrade''``` va el nombre de la base de datos a la cual quieras hacer la conexión.
Con este archivo se incluye el archivo ```jorgeandrade SCRYT SQL``` que contiene la base de datos creada para ser importada en una base de datos vacía.

## Migraciones y Seeders
Si no se quiso importar el archivo ```jorgeandrade SCRYPT SQL``` se pueden ejecutar migraciones para poder tener la base de datos lista para trabajar.
El comando para ejecutar la migración ```2021-06-09-150339_CreateUsersMigration.php``` que se encuentra en la carpeta ```app\Database\Migrations``` es
```bash
php spark migrate
```
Luego, para poder tener un administrador agregado en la base de datos y hacer login se debe ejecutar el archivo ```UserSeeder.php``` que se encuentra en la carpeta ```app\Database\Seeds``` con el siguiente comando:
```bash
php spark db:seed UserSeeder
```

Las credenciales del usuario que se crea son la siguientes:

```bash
'mail': 'jorge@jorge.com'
'password': '123456789'
```

## Cómo abordé el problema
Después de crear el seeder estará el usuario ingresado en la base de datos. Este usuario es el único administrador del sistema, quien crea a los demas usuarios e ingresa sus datos.
Los usuarios podrán hacer login pero solo podrán editar sus datos.
Para eliminar a los usuarios solo lo podrá hacer el administrador (y este no se puede borrar así mismo ya que el software quedaría inutilizable).
El administrador también puede editar los datos de los usuarios, pero no sus contraseñas.
Los correos no dejé que sean cambiados ya que son las llaves foráneas y puede ocasionar problemas.
