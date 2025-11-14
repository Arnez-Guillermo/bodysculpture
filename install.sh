#!/bin/bash

echo "========================================"
echo "Instalación de BodySculpture"
echo "========================================"
echo ""

echo "[1/8] Instalando dependencias de PHP..."
composer install --no-interaction
if [ $? -ne 0 ]; then
    echo "ERROR: Falló la instalación de Composer"
    exit 1
fi
echo ""

echo "[2/8] Instalando dependencias de Node.js..."
npm install
if [ $? -ne 0 ]; then
    echo "ERROR: Falló la instalación de NPM"
    exit 1
fi
echo ""

echo "[3/8] Verificando archivo .env..."
if [ ! -f .env ]; then
    echo "Creando archivo .env desde .env.example..."
    cp .env.example .env
    echo "IMPORTANTE: Edita el archivo .env y configura tu base de datos"
else
    echo "Archivo .env ya existe"
fi
echo ""

echo "[4/8] Generando clave de aplicación..."
php artisan key:generate --no-interaction
if [ $? -ne 0 ]; then
    echo "ERROR: No se pudo generar la clave"
    exit 1
fi
echo ""

echo "[5/8] Ejecutando migraciones..."
echo "IMPORTANTE: Asegúrate de tener configurada la base de datos en .env"
php artisan migrate --force
if [ $? -ne 0 ]; then
    echo "ERROR: Falló la ejecución de migraciones"
    echo "Verifica tu configuración de base de datos en .env"
    exit 1
fi
echo ""

echo "[6/8] Ejecutando seeders..."
php artisan db:seed --force
if [ $? -ne 0 ]; then
    echo "ERROR: Falló la ejecución de seeders"
    exit 1
fi
echo ""

echo "[7/8] Creando enlace simbólico de storage..."
php artisan storage:link
if [ $? -ne 0 ]; then
    echo "ADVERTENCIA: No se pudo crear el enlace simbólico"
    echo "Esto puede ser normal si ya existe"
fi
echo ""

echo "[8/8] Compilando assets..."
npm run build
if [ $? -ne 0 ]; then
    echo "ERROR: Falló la compilación de assets"
    exit 1
fi
echo ""

echo "========================================"
echo "Instalación completada!"
echo "========================================"
echo ""
echo "Usuarios creados:"
echo "  Admin: admin@bodysculpture.com / password"
echo "  Cliente: cliente@example.com / password"
echo ""
echo "Para iniciar el servidor:"
echo "  php artisan serve"
echo ""
echo "Luego abre: http://localhost:8000"
echo ""

