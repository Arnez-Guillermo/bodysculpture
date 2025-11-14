@echo off
echo ========================================
echo Instalacion de BodySculpture
echo ========================================
echo.

echo [1/8] Instalando dependencias de PHP...
call composer install --no-interaction
if %errorlevel% neq 0 (
    echo ERROR: Fallo la instalacion de Composer
    pause
    exit /b 1
)
echo.

echo [2/8] Instalando dependencias de Node.js...
call npm install
if %errorlevel% neq 0 (
    echo ERROR: Fallo la instalacion de NPM
    pause
    exit /b 1
)
echo.

echo [3/8] Verificando archivo .env...
if not exist .env (
    echo Creando archivo .env desde .env.example...
    copy .env.example .env
    echo IMPORTANTE: Edita el archivo .env y configura tu base de datos
) else (
    echo Archivo .env ya existe
)
echo.

echo [4/8] Generando clave de aplicacion...
call php artisan key:generate --no-interaction
if %errorlevel% neq 0 (
    echo ERROR: No se pudo generar la clave
    pause
    exit /b 1
)
echo.

echo [5/8] Ejecutando migraciones...
echo IMPORTANTE: Asegurate de tener configurada la base de datos en .env
call php artisan migrate --force
if %errorlevel% neq 0 (
    echo ERROR: Fallo la ejecucion de migraciones
    echo Verifica tu configuracion de base de datos en .env
    pause
    exit /b 1
)
echo.

echo [6/8] Ejecutando seeders...
call php artisan db:seed --force
if %errorlevel% neq 0 (
    echo ERROR: Fallo la ejecucion de seeders
    pause
    exit /b 1
)
echo.

echo [7/8] Creando enlace simbolico de storage...
call php artisan storage:link
if %errorlevel% neq 0 (
    echo ADVERTENCIA: No se pudo crear el enlace simbolico
    echo Esto puede ser normal si ya existe
)
echo.

echo [8/8] Compilando assets...
call npm run build
if %errorlevel% neq 0 (
    echo ERROR: Fallo la compilacion de assets
    pause
    exit /b 1
)
echo.

echo ========================================
echo Instalacion completada!
echo ========================================
echo.
echo Usuarios creados:
echo   Admin: admin@bodysculpture.com / password
echo   Cliente: cliente@example.com / password
echo.
echo Para iniciar el servidor:
echo   php artisan serve
echo.
echo Luego abre: http://localhost:8000
echo.
pause

