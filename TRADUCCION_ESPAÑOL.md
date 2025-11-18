# Traducción de Tablas y Columnas al Español

## Tablas Traducidas

| Inglés | Español |
|--------|---------|
| users | usuarios |
| password_reset_tokens | tokens_reseteo_contraseña |
| sessions | sesiones |
| cache | cache (sin cambios) |
| cache_locks | bloqueos_cache |
| jobs | trabajos |
| job_batches | lotes_trabajos |
| failed_jobs | trabajos_fallidos |
| roles | roles (sin cambios) |
| model_has_roles | modelo_tiene_roles |
| categories | categorias |
| brands | marcas |
| products | productos |
| product_images | imagenes_productos |
| product_specifications | especificaciones_productos |
| carts | carritos |
| cart_items | items_carrito |
| orders | pedidos |
| order_items | items_pedido |
| contacts | contactos |

## Columnas Principales Traducidas

### usuarios (users)
- name → nombre
- email_verified_at → email_verificado_en
- password → contraseña
- phone → telefono
- address → direccion
- city → ciudad
- postal_code → codigo_postal

### categorias (categories)
- name → nombre
- description → descripcion
- image → imagen
- parent_id → categoria_padre_id
- is_active → activa

### marcas (brands)
- name → nombre
- logo → logo (sin cambios)
- is_active → activa

### productos (products)
- name → nombre
- description → descripcion
- short_description → descripcion_corta
- price → precio
- compare_price → precio_comparacion
- stock → stock (sin cambios)
- min_stock → stock_minimo
- weight → peso
- dimensions → dimensiones
- level → nivel (valores: 'hogar', 'profesional')
- is_active → activo
- is_featured → destacado
- category_id → categoria_id
- brand_id → marca_id
- meta_title → meta_titulo
- meta_description → meta_descripcion

### pedidos (orders)
- order_number → numero_pedido
- user_id → usuario_id
- status → estado (valores: 'pendiente', 'pagado', 'enviado', 'completado', 'cancelado')
- tax → impuesto
- shipping_cost → costo_envio
- customer_name → nombre_cliente
- customer_email → email_cliente
- customer_phone → telefono_cliente
- shipping_address → direccion_envio
- shipping_city → ciudad_envio
- shipping_postal_code → codigo_postal_envio
- notes → notas
- payment_method → metodo_pago
- payment_reference → referencia_pago

## Próximos Pasos

1. ✅ Migraciones traducidas
2. ⏳ Actualizar modelos para usar nombres de tablas en español
3. ⏳ Actualizar relaciones en modelos
4. ⏳ Actualizar controladores y servicios
5. ⏳ Actualizar seeders
6. ⏳ Ejecutar migraciones
7. ⏳ Ejecutar seeders

