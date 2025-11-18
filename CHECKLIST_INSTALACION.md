# Checklist de Instalación - BodySculpture

## Estado Actual

### ✅ Completado
- [x] Código del proyecto implementado
- [x] Migraciones creadas
- [x] Modelos y controladores implementados
- [x] Vistas Blade creadas

### ⚠️ Pendiente de Ejecutar

#### 1. Dependencias
- [ ] **Composer install** - Instalar dependencias PHP
  ```bash
  composer install
  ```
  ⚠️ **IMPORTANTE:** Este comando debe completarse para poder usar artisan

- [ ] **NPM install** - Instalar dependencias Node.js
  ```bash
  npm install
  ```
  ⚠️ **IMPORTANTE:** Necesario para Bootstrap 5 y compilar assets

#### 2. Configuración
- [ ] **Configurar .env** - Editar archivo `.env`:
  ```env
  DB_CONNECTION=mysql
  DB_DATABASE=nombre_de_tu_base_de_datos
  DB_USERNAME=tu_usuario
  DB_PASSWORD=tu_contraseña
  APP_URL=http://localhost:8000
  ```

- [ ] **Generar APP_KEY**
  ```bash
  php artisan key:generate
  ```

#### 3. Base de Datos
- [ ] **Crear base de datos** en MySQL con el nombre configurado en `.env`

- [ ] **Ejecutar migraciones**
  ```bash
  php artisan migrate
  ```

- [ ] **Ejecutar seeders**
  ```bash
  php artisan db:seed
  ```
  Esto creará usuarios y datos iniciales.

#### 4. Assets y Storage
- [ ] **Crear enlace simbólico**
  ```bash
  php artisan storage:link
  ```

- [ ] **Compilar assets**
  ```bash
  npm run build
  ```
  O para desarrollo:
  ```bash
  npm run dev
  ```

#### 5. Iniciar Servidor
- [ ] **Iniciar servidor de desarrollo**
  ```bash
  php artisan serve
  ```

## Orden de Ejecución Recomendado

1. ✅ `composer install` (debe completarse primero)
2. ✅ `npm install` (puede ejecutarse en paralelo)
3. ⏳ Configurar `.env` con base de datos
4. ⏳ `php artisan key:generate`
5. ⏳ Crear base de datos en MySQL
6. ⏳ `php artisan migrate`
7. ⏳ `php artisan db:seed`
8. ⏳ `php artisan storage:link`
9. ⏳ `npm run build` o `npm run dev`
10. ⏳ `php artisan serve`

## Verificación Rápida

Ejecuta estos comandos para verificar el estado:

```powershell
# Verificar Composer
Test-Path vendor/autoload.php

# Verificar NPM
Test-Path node_modules

# Verificar .env
Test-Path .env

# Verificar APP_KEY (debe tener un valor, no estar vacío)
Select-String -Path .env -Pattern "APP_KEY="
```

## Notas Importantes

1. **Composer install** es crítico - sin él no puedes ejecutar ningún comando `php artisan`
2. **NPM install** es necesario para compilar Bootstrap 5 y otros assets
3. La base de datos debe existir antes de ejecutar migraciones
4. Los seeders crean usuarios de prueba que puedes usar para iniciar sesión

## Usuarios que se Crean con el Seeder

- **Admin:** `admin@bodysculpture.com` / `password`
- **Cliente:** `cliente@example.com` / `password`

