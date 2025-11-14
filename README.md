# BodySculpture - E-commerce de Artículos Fitness

Aplicación web desarrollada en Laravel 12 para la venta de artículos fitness (bicicletas, pesas, máquinas y accesorios).

## Características

- **Catálogo de productos** con filtros, búsqueda y paginación
- **Carrito de compras** con persistencia para usuarios logueados
- **Sistema de pedidos** completo con estados
- **Panel de administración** para gestión de productos, categorías, marcas y pedidos
- **Sistema de roles** (Admin y Cliente)
- **Páginas estáticas** (Quiénes somos, Contacto)
- **Formulario de contacto** con validación

## Requisitos

- PHP 8.2 o superior
- Composer
- Node.js y NPM
- MySQL/MariaDB
- Laravel 12

## Instalación Rápida

### Opción 1: Script Automático (Recomendado)

**Windows:**
```bash
install.bat
```

**Linux/Mac:**
```bash
chmod +x install.sh
./install.sh
```

### Opción 2: Instalación Manual

1. **Instalar dependencias de PHP:**
```bash
composer install
```

2. **Instalar dependencias de Node.js:**
```bash
npm install
```

3. **Configurar el archivo .env:**
```bash
# Windows PowerShell:
Copy-Item .env.example .env

# Linux/Mac:
cp .env.example .env
```

Editar `.env` y configurar:
- `DB_CONNECTION=mysql`
- `DB_DATABASE=nombre_de_tu_base_de_datos`
- `DB_USERNAME=tu_usuario`
- `DB_PASSWORD=tu_contraseña`
- `APP_URL=http://localhost:8000`

4. **Generar clave de aplicación:**
```bash
php artisan key:generate
```

5. **Ejecutar migraciones y seeders:**
```bash
php artisan migrate
php artisan db:seed
```

6. **Crear el enlace simbólico para storage:**
```bash
php artisan storage:link
```

7. **Compilar assets:**
```bash
npm run build
```

O para desarrollo:
```bash
npm run dev
```

8. **Iniciar servidor:**
```bash
php artisan serve
```

Ver documentación completa en [INSTALACION.md](INSTALACION.md)

## Usuarios por Defecto

Después de ejecutar el seeder, se crean los siguientes usuarios:

- **Administrador:**
  - Email: `admin@bodysculpture.com`
  - Password: `password`

- **Cliente de ejemplo:**
  - Email: `cliente@example.com`
  - Password: `password`

## Estructura del Proyecto

```
app/
├── Http/
│   ├── Controllers/
│   │   ├── Admin/          # Controladores del panel admin
│   │   ├── CartController.php
│   │   ├── CatalogController.php
│   │   ├── CheckoutController.php
│   │   └── OrderController.php
│   ├── Middleware/         # Middleware personalizado
│   ├── Requests/           # Form Requests para validación
│   └── Policies/           # Políticas de autorización
├── Models/                  # Modelos Eloquent
└── Services/                # Servicios de lógica de negocio
    ├── CartService.php
    ├── OrderService.php
    └── PaymentService.php  # Interfaz para futuras integraciones
```

## Rutas Principales

### Públicas
- `/` - Página de inicio
- `/catalogo` - Catálogo de productos
- `/producto/{slug}` - Detalle de producto
- `/quienes-somos` - Página sobre nosotros
- `/contacto` - Formulario de contacto

### Autenticadas (Cliente)
- `/carrito` - Carrito de compras
- `/checkout` - Proceso de checkout
- `/mis-pedidos` - Historial de pedidos

### Administración
- `/admin/dashboard` - Panel de administración
- `/admin/products` - Gestión de productos
- `/admin/categories` - Gestión de categorías
- `/admin/brands` - Gestión de marcas
- `/admin/orders` - Gestión de pedidos

## Seguridad Implementada

- ✅ CSRF protection (incluido en Laravel)
- ✅ Validación con Form Requests
- ✅ Middleware de autenticación
- ✅ Middleware de roles (admin)
- ✅ Rate limiting en formularios públicos
- ✅ Sanitización de inputs
- ✅ Protección contra SQL Injection (Eloquent)
- ✅ Protección XSS (escapado en Blade)

## Próximos Pasos

- [ ] Instalar Laravel Breeze para autenticación completa
- [ ] Configurar sistema de emails
- [ ] Implementar subida de imágenes para productos
- [ ] Integrar pasarela de pago (Mercado Pago, Stripe, etc.)
- [ ] Agregar tests unitarios y de integración
- [ ] Implementar caché para categorías y marcas
- [ ] Optimización de imágenes
- [ ] Sistema de notificaciones por email

## Notas

- Bootstrap 5 está configurado localmente vía NPM y Vite
- El sistema de roles es básico (se puede mejorar con Spatie Laravel Permission)
- La interfaz PaymentService está preparada para futuras integraciones
- El carrito se migra automáticamente de sesión a BD al hacer login

## Licencia

Este proyecto es de código abierto.
