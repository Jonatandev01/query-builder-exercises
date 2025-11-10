# Guía de Ejercicios - Query Builder & Eloquent (Proyecto ligero)

Este proyecto contiene una **implementación ligera** de los ejercicios de Query Builder y Eloquent (Laravel-style) usando **Illuminate Database** (Eloquent) y **SQLite**, para que puedas ejecutar las consultas rápidamente sin crear un proyecto Laravel completo.

## Requisitos
- PHP 8.0+
- Composer

## Pasos para ejecutar (rápido)
1. Descomprime el ZIP.
2. Abre una terminal en la carpeta del proyecto.
3. Ejecuta:
   ```bash
   composer install
   ```
4. Crea la base de datos SQLite y ejecuta migraciones y seeders:
   ```bash
   php migrate.php
   ```
   Esto creará `database/database.sqlite` y añadirá datos de ejemplo (5 usuarios y varios pedidos).

5. Ejecuta las consultas y verás los resultados en la terminal:
   ```bash
   php run.php
   ```

## Archivos importantes
- `migrate.php` : Ejecuta las migraciones y seeders.
- `run.php` : Ejecuta cada uno de los ejercicios y muestra la salida.
- `src/Models/User.php`, `src/Models/Order.php` : Modelos Eloquent.
- `src/bootstrap.php` : Conexión a la base de datos y configuración Eloquent.

