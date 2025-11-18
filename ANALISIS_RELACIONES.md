# Análisis de Relaciones y Foreign Keys

## Foreign Keys en Migraciones (Español)

### ✅ Definidas Correctamente:

1. **modelo_tiene_roles**
   - `rol_id` → `roles.id` (CASCADE)

2. **categorias**
   - `categoria_padre_id` → `categorias.id` (CASCADE) - Auto-referencia

3. **productos**
   - `categoria_id` → `categorias.id` (RESTRICT)
   - `marca_id` → `marcas.id` (SET NULL)

4. **imagenes_productos**
   - `producto_id` → `productos.id` (CASCADE)

5. **especificaciones_productos**
   - `producto_id` → `productos.id` (CASCADE)

6. **carritos**
   - `usuario_id` → `usuarios.id` (CASCADE)

7. **items_carrito**
   - `carrito_id` → `carritos.id` (CASCADE)
   - `producto_id` → `productos.id` (CASCADE)

8. **pedidos**
   - `usuario_id` → `usuarios.id` (SET NULL)

9. **items_pedido**
   - `pedido_id` → `pedidos.id` (CASCADE)
   - `producto_id` → `productos.id` (RESTRICT)

10. **sesiones**
    - `usuario_id` → `usuarios.id` (INDEX, nullable)

## Relaciones en Modelos - Estado Actual

### ❌ Problemas Identificados:

1. **User Model**
   - ✅ `orders()` - OK pero necesita foreign key `usuario_id`
   - ✅ `cart()` - OK pero necesita foreign key `usuario_id`
   - ✅ `roles()` - Actualizado para español

2. **Category Model**
   - ✅ `parent()` - Actualizado con `categoria_padre_id`
   - ✅ `children()` - Actualizado con `categoria_padre_id`
   - ✅ `products()` - Necesita foreign key `categoria_id`

3. **Brand Model**
   - ✅ `products()` - Necesita foreign key `marca_id`

4. **Product Model**
   - ❌ `category()` - Necesita especificar `categoria_id`
   - ❌ `brand()` - Necesita especificar `marca_id`
   - ❌ `images()` - Necesita especificar `producto_id` y columna `orden`
   - ❌ `primaryImage()` - Necesita especificar `producto_id` y columna `es_principal`
   - ❌ `specifications()` - Necesita especificar `producto_id` y columna `orden`
   - ❌ `cartItems()` - Necesita especificar `producto_id`
   - ❌ `orderItems()` - Necesita especificar `producto_id`
   - ❌ Scopes usan `is_active` pero debe ser `activo`

5. **ProductImage Model**
   - ❌ `product()` - Necesita especificar `producto_id`
   - ❌ Fillable usa nombres en inglés

6. **ProductSpecification Model**
   - ❌ `product()` - Necesita especificar `producto_id`
   - ❌ Fillable usa nombres en inglés

7. **Cart Model**
   - ❌ `user()` - Necesita especificar `usuario_id`
   - ❌ `items()` - Necesita especificar `carrito_id`
   - ❌ Fillable usa nombres en inglés
   - ❌ Accesores usan `price` y `quantity` (deben ser `precio` y `cantidad`)

8. **CartItem Model**
   - ❌ `cart()` - Necesita especificar `carrito_id`
   - ❌ `product()` - Necesita especificar `producto_id`
   - ❌ Fillable usa nombres en inglés
   - ❌ Accesor usa `price` (debe ser `precio`)

9. **Order Model**
   - ❌ `user()` - Necesita especificar `usuario_id`
   - ❌ `items()` - Necesita especificar `pedido_id`
   - ❌ Fillable usa nombres en inglés
   - ❌ Métodos de estado usan valores en inglés ('pending', 'paid', etc.)

10. **OrderItem Model**
    - ❌ `order()` - Necesita especificar `pedido_id`
    - ❌ `product()` - Necesita especificar `producto_id`
    - ❌ Fillable usa nombres en inglés
    - ❌ Accesor usa `price` (debe ser `precio`)

11. **Contact Model**
    - ❌ Fillable usa nombres en inglés

## Relaciones Futuras Útiles

### Relaciones que podrían agregarse:

1. **User → Orders (historial)**
   - Ya existe, pero podría agregar scopes:
   - `recentOrders()`, `pendingOrders()`, `completedOrders()`

2. **Product → Reviews (futuro)**
   - Para sistema de reseñas de productos

3. **Order → Shipping (futuro)**
   - Para tracking de envíos

4. **User → Addresses (futuro)**
   - Para múltiples direcciones de envío

5. **Product → Wishlist (futuro)**
   - Para lista de deseos

6. **Category → Products (count)**
   - Agregar `withCount('products')` para mostrar cantidad

7. **Brand → Products (count)**
   - Agregar `withCount('products')` para mostrar cantidad

## Acciones Requeridas

1. ✅ Actualizar todos los modelos con `protected $table`
2. ✅ Actualizar todos los `$fillable` con nombres en español
3. ✅ Especificar foreign keys explícitas en todas las relaciones
4. ✅ Actualizar scopes para usar nombres de columnas en español
5. ✅ Actualizar accesores para usar nombres de columnas en español
6. ✅ Actualizar métodos de estado en Order para usar valores en español

