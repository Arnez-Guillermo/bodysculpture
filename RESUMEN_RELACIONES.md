# Resumen de Relaciones y Foreign Keys - Actualizado

## ✅ Todas las Relaciones Corregidas

### Foreign Keys en Migraciones (Todas correctas)

1. **modelo_tiene_roles**
   - `rol_id` → `roles.id` (CASCADE)

2. **categorias** (Auto-referencia)
   - `categoria_padre_id` → `categorias.id` (CASCADE)

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

## ✅ Modelos Actualizados con Relaciones Correctas

### User (usuarios)
- ✅ `orders()` - Foreign key: `usuario_id`
- ✅ `cart()` - Foreign key: `usuario_id`
- ✅ `roles()` - Tabla: `modelo_tiene_roles`, Foreign keys: `rol_id`, `modelo_id`

### Category (categorias)
- ✅ `parent()` - Foreign key: `categoria_padre_id`
- ✅ `children()` - Foreign key: `categoria_padre_id`
- ✅ `products()` - Foreign key: `categoria_id`

### Brand (marcas)
- ✅ `products()` - Foreign key: `marca_id`

### Product (productos)
- ✅ `category()` - Foreign key: `categoria_id`
- ✅ `brand()` - Foreign key: `marca_id`
- ✅ `images()` - Foreign key: `producto_id`, ordena por `orden`
- ✅ `primaryImage()` - Foreign key: `producto_id`, filtra por `es_principal`
- ✅ `specifications()` - Foreign key: `producto_id`, ordena por `orden`
- ✅ `cartItems()` - Foreign key: `producto_id`
- ✅ `orderItems()` - Foreign key: `producto_id`

### ProductImage (imagenes_productos)
- ✅ `product()` - Foreign key: `producto_id`

### ProductSpecification (especificaciones_productos)
- ✅ `product()` - Foreign key: `producto_id`

### Cart (carritos)
- ✅ `user()` - Foreign key: `usuario_id`
- ✅ `items()` - Foreign key: `carrito_id`
- ✅ Accesores actualizados para usar `precio` y `cantidad`

### CartItem (items_carrito)
- ✅ `cart()` - Foreign key: `carrito_id`
- ✅ `product()` - Foreign key: `producto_id`
- ✅ Accesor actualizado para usar `precio` y `cantidad`

### Order (pedidos)
- ✅ `user()` - Foreign key: `usuario_id`
- ✅ `items()` - Foreign key: `pedido_id`
- ✅ Métodos de estado actualizados para valores en español

### OrderItem (items_pedido)
- ✅ `order()` - Foreign key: `pedido_id`
- ✅ `product()` - Foreign key: `producto_id`

### Contact (contactos)
- ✅ Sin relaciones (tabla independiente)

## Relaciones Futuras Recomendadas

### Para implementar más adelante:

1. **User → Addresses** (múltiples direcciones)
   ```php
   public function addresses(): HasMany
   {
       return $this->hasMany(Address::class, 'usuario_id');
   }
   ```

2. **Product → Reviews** (reseñas)
   ```php
   public function reviews(): HasMany
   {
       return $this->hasMany(Review::class, 'producto_id');
   }
   ```

3. **Order → Shipping** (tracking de envíos)
   ```php
   public function shipping(): HasOne
   {
       return $this->hasOne(Shipping::class, 'pedido_id');
   }
   ```

4. **User → Wishlist** (lista de deseos)
   ```php
   public function wishlist(): HasMany
   {
       return $this->hasMany(WishlistItem::class, 'usuario_id');
   }
   ```

5. **Category → Products (count)** (para estadísticas)
   ```php
   // Ya existe la relación, solo usar withCount
   Category::withCount('products')->get();
   ```

6. **Brand → Products (count)** (para estadísticas)
   ```php
   // Ya existe la relación, solo usar withCount
   Brand::withCount('products')->get();
   ```

## Estado Final

✅ **Todas las relaciones están correctamente definidas con:**
- Nombres de tablas en español
- Foreign keys explícitas en todas las relaciones
- Nombres de columnas en español en fillable
- Accesores y métodos actualizados
- Scopes actualizados con nombres en español

## Próximos Pasos

1. ⏳ Actualizar controladores para usar nombres en español
2. ⏳ Actualizar servicios (CartService, OrderService)
3. ⏳ Actualizar seeders
4. ⏳ Actualizar vistas Blade
5. ⏳ Ejecutar migraciones
6. ⏳ Ejecutar seeders

