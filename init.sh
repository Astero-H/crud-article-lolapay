#!/bin/bash

# Copy .env.example to .env if .env do not exist
if [ ! -f ".env" ]; then
  cp .env.example .env
fi

# Generate app key
php artisan key:generate --no-interaction

# Exec migrations and seeding
php artisan migrate --no-interaction
php artisan db:seed --no-interaction

# Starting Apache
exec apache2-foreground