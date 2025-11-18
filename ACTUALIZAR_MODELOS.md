# Actualización de Modelos para Español

## Estado

He comenzado la traducción de tablas y columnas al español. Las migraciones están completas, pero los modelos necesitan actualizarse.

## Cambios Necesarios en Modelos

### ✅ Completado
- User.php - Parcialmente actualizado (tabla y fillable)
- Role.php - Actualizado
- Category.php - Actualizado

### ⏳ Pendiente
- Brand.php
- Product.php
- ProductImage.php
- ProductSpecification.php
- Cart.php
- CartItem.php
- Order.php
- OrderItem.php
- Contact.php

## Nota Importante

**Laravel usa convenciones de nombres en inglés por defecto.** Para usar nombres en español, necesitamos:

1. Agregar `protected $table = 'nombre_tabla_español';` en cada modelo
2. Actualizar `$fillable` con nombres de columnas en español
3. Actualizar relaciones para usar claves foráneas en español
4. Actualizar scopes y métodos que usen nombres de columnas

## Problema con "contraseña"

El campo `password` en Laravel tiene un tratamiento especial. Si lo cambiamos a `contraseña`, necesitamos actualizar:
- La configuración de autenticación
- Los controladores de login/registro
- Los form requests

**Recomendación:** Mantener `password` en inglés para evitar problemas con el sistema de autenticación de Laravel, o actualizar toda la configuración de autenticación.

## Próximos Pasos

1. Decidir si mantener `password` o cambiar todo el sistema de autenticación
2. Actualizar todos los modelos restantes
3. Actualizar controladores y servicios
4. Actualizar seeders
5. Ejecutar migraciones y seeders

