# Guía de Instalación - BodySculpture

## Pasos de Instalación

### 1. Instalar Dependencias de PHP
```bash
composer install
```

### 2. Instalar Dependencias de Node.js
```bash
npm install
```

### 3. Configurar Archivo .env
Si no existe el archivo `.env`, cópialo desde `.env.example`:
```bash
# En Windows PowerShell:
Copy-Item .env.example .env

# En Linux/Mac:
cp .env.example .env
```

Luego edita el archivo `.env` y configura:
- `DB_CONNECTION=mysql`
- `DB_DATABASE=nombre_de_tu_base_de_datos`
- `DB_USERNAME=tu_usuario`
- `DB_PASSWORD=tu_contraseña`
- `APP_URL=http://localhost:8000`

### 4. Generar Clave de Aplicación
```bash
php artisan key:generate
```

### 5. Ejecutar Migraciones
```bash
php artisan migrate
```

### 6. Ejecutar Seeders (Datos Iniciales)
```bash
php artisan db:seed
```

Esto creará:
- Usuario administrador: `admin@bodysculpture.com` / `password`
- Usuario cliente: `cliente@example.com` / `password`
- Categorías básicas (Bicicletas, Pesas, Máquinas, Accesorios)
- Marcas básicas (ProForm, NordicTrack, Bowflex, Weider)

### 7. Crear Enlace Simbólico para Storage
```bash
php artisan storage:link
```

### 8. Compilar Assets

**Para desarrollo:**
```bash
npm run dev
```

**Para producción:**
```bash
npm run build
```

### 9. Iniciar Servidor de Desarrollo
```bash
php artisan serve
```

Luego abre tu navegador en: `http://localhost:8000`

## Verificación

Una vez completada la instalación, deberías poder:

1. ✅ Acceder a la página de inicio
2. ✅ Ver el catálogo de productos
3. ✅ Iniciar sesión con el usuario admin o cliente
4. ✅ Acceder al panel de administración (solo admin)
5. ✅ Agregar productos al carrito
6. ✅ Realizar un pedido

## Solución de Problemas

### Error: "No such file or directory vendor/autoload.php"
- Ejecuta: `composer install`

### Error: "Class 'App\Http\Controllers\...' not found"
- Ejecuta: `composer dump-autoload`

### Error: "SQLSTATE[HY000] [1045] Access denied"
- Verifica las credenciales de la base de datos en `.env`

### Error: "Vite manifest not found"
- Ejecuta: `npm run dev` o `npm run build`

### Las imágenes no se muestran
- Ejecuta: `php artisan storage:link`

## Notas Importantes

- Asegúrate de tener MySQL/MariaDB corriendo antes de ejecutar las migraciones
- El usuario administrador tiene acceso al panel en `/admin/dashboard`
- Todos los usuarios nuevos se registran como "customer" por defecto
- Para convertir un usuario en admin, ejecuta en tinker:
  ```bash
  php artisan tinker
  $user = User::where('email', 'email@example.com')->first();
  $user->assignRole('admin');
  ```

