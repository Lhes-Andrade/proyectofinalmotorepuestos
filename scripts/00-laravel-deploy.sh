#!/usr/bin/env bash
echo "Instalando dependencias con Composer..."
composer install --no-dev --working-dir=/var/www/html

echo "Cacheando configuración..."
php artisan config:cache

echo "Cacheando rutas..."
php artisan route:cache

echo "Creando enlace simbólico de storage..."
php artisan storage:link

echo "Ejecutando migraciones..."
php artisan migrate --force