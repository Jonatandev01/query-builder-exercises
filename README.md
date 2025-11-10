# Guía de Ejercicios - Query Builder & Eloquent (Proyecto ligero)

**Autor:** Jonatan Elías Guevara Chicas  
**Curso:** Full Stack Junior – Kodigo  
**Año:** 2025  

---

## 🧩 Descripción del Proyecto

Este proyecto presenta una **implementación ligera** de los ejercicios de **Query Builder y Eloquent ORM (Laravel-style)** utilizando el paquete `illuminate/database` (Eloquent) y una base de datos **SQLite**, para ejecutar las consultas sin necesidad de un proyecto Laravel completo.

El objetivo es demostrar el uso de consultas SQL programáticas, manejo de relaciones entre tablas y optimización de datos mediante el ORM Eloquent, cumpliendo los criterios de la **Guía de Ejercicios Query Builder**.

---

## ⚙️ Requisitos

- PHP 8.0 o superior  
- Composer

---

## 🚀 Pasos para ejecutar el proyecto

1. **Descomprime** el proyecto o clona el repositorio.  
2. Abre una **terminal** en la carpeta del proyecto.  
3. Instala dependencias:
   ```bash
   composer install
   ```
4. Ejecuta las migraciones y carga de datos de ejemplo:
   ```bash
   php migrate.php
   ```
   Esto creará el archivo `database/database.sqlite` con tablas y registros de ejemplo (usuarios y pedidos).

5. Ejecuta los ejercicios:
   ```bash
   php run.php
   ```
   Verás los resultados de cada consulta (como `where`, `between`, `sum`, `orderBy`, `with`, `groupBy`) directamente en la terminal.

---

## 🧠 Consultas Implementadas

1. Contar registros en `users`.  
2. Pedidos del usuario con ID = 2.  
3. Pedidos con información del usuario (relación `belongsTo`).  
4. Pedidos con `total` entre 100 y 250.  
5. Usuarios cuyos nombres comienzan con “R”.  
6. Conteo de pedidos del usuario con ID = 5.  
7. Pedidos ordenados descendentemente por total.  
8. Suma total del campo `total` de todos los pedidos.  
9. Pedido más económico con información del usuario.  
10. Agrupación de pedidos por usuario (relación `hasMany`).  
11. Ejercicio adicional: Totales de pedidos agrupados por usuario.

**© 2025 - Kodigo | Proyecto académico realizado por Jonatan Elías Guevara Chicas**
