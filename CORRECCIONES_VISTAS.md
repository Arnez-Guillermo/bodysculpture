# Correcciones Necesarias en Vistas

## ✅ Corregidas
- home.blade.php - `parent_id` → `categoria_padre_id`, `name` → `nombre`, `description` → `descripcion`
- product-card.blade.php - Todos los nombres actualizados

## ⏳ Pendientes (28 archivos encontrados)
Necesitan actualización para usar nombres en español:
- auth/register.blade.php
- auth/login.blade.php
- pages/contact.blade.php
- admin/* (todos los archivos)
- catalog/* (todos los archivos)
- cart/index.blade.php
- checkout/index.blade.php
- orders/*

## Nota Importante
Las vistas deben usar los nombres de columnas en español:
- `$category->nombre` en lugar de `$category->name`
- `$product->precio` en lugar de `$product->price`
- `$product->descripcion` en lugar de `$product->description`
- etc.

